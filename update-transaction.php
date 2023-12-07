<?php
session_start();
$transaction = $_SESSION["table_transaction"];
$tid = $_POST["tid"];
echo "Transaction ID $tid";
foreach ($transaction as $t) {
    if ($t["tid"] == $tid) {
        $_POST["title"] = $t["title"];
        $_POST["date"] = $t["date"];
        $_POST["type"] = $t["type"];
        $_POST["account"] = $t["account"];
        $_POST["category"] = $t["category"];
        $_POST["amount"] = $t["amount"];
        $_POST["status"] = $t["status"];
    }
}
?>

<!-- Modal - Update Transaction -->
<div class="modal fade" id="editTransactionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="include/update-transaction.inc.php">
                <div class="modal-body">

                        <!-- Title input -->
                        <div class="form-group">
                            <label for="transactionTitle">Title</label>
                            <input type="text" name="title" class="form-control" id="transactionTitle" 
                                value="<?php echo $_POST['title']; ?>" required>
                        </div>

                        <!-- Date input -->
                        <div class="form-group">
                            <label for="transactionDate">Date</label>
                            <input type="date" name="date" class="form-control" id="transactionDate"
                            value="<?php echo $_POST['date']; ?>" required>
                        </div>

                        <!-- Type dropdown -->
                        <div class="form-group">
                            <label for="transactionType">Type</label>
                            <select class="form-control" name="type" id="transactionType" 
                            value="<?php echo $_POST['type']; ?>" required>
                                <option value="Income">Income</option>
                                <option value="Expense">Expense</option>
                            </select>
                        </div>

                        <!-- Account dropdown -->
                        <div class="form-group">
                            <label for="transactionAccount">Account</label>
                            <select class="form-control" name="account" id="transactionAccount"
                            value="<?php echo $_POST['account']; ?>" required>
                                <option value="Personal">Personal</option>
                                <option value="Business">Business</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>

                        <!-- Category dropdown -->
                        <div class="form-group">
                            <label for="transactionCategory">Category</label>
                            <select class="form-control" name="category" id="transactionCategory"
                            value="<?php echo $_POST['category']; ?>" required>
                                <option value="Housing">Housing</option>
                                <option value="Food">Food</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Health">Health</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Saving">Saving</option>
                                <option value="Misc">Misc</option>
                            </select>
                        </div>

                        <!-- Status dropdown -->
                        <div class="form-group">
                            <label for="transactionAmount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="transactionAmount" 
                            value="<?php echo $_POST['amount']; ?>"required>
                        </div>

                        <!-- Status dropdown -->
                        <div class="form-group">
                            <label for="transactionStatus">Status</label>
                            <select class="form-control" name="status" id="transactionStatus"
                            value="<?php echo $_POST['status']; ?>" required>
                                <option value="Finish">Finish</option>
                                <option value="Reserved">Reserved</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save Transaction</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/format.js"></script>
