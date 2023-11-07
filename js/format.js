// JavaScript function to format the balance as Rupiah
function formatToRupiah(amount) {
    if(isNaN(amount))
        return "Rp 0";

    return new Intl.NumberFormat('id-ID', {style: 'currency', currency: 'IDR'}).format(amount);
}

