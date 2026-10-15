document.getElementById("send").addEventListener("click", function() {
    document.getElementById("Hello").textContent = "Udało Ci się!";
});

document.getElementById("calculate").onclick = function() {
    let price = document.getElementById("price").value
    let amount = document.getElementById("amount").value
    let result = price * amount
    document.getElementById("result").textContent = "Cena to: " + result + " zł"
}