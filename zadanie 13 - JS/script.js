document.getElementById("send").addEventListener("click", function() {
    document.getElementById("Hello").textContent = "Udało Ci się!";
});

document.getElementById("calculate").onclick = function() {
    let price = document.getElementById("price").value
    let amount = document.getElementById("amount").value
    let result = price * amount
    document.getElementById("result").textContent = "Cena to: " + result + " zł"
}

document.getElementById("oblicz").onclick = function() {
    let length = document.getElementById("length").value
    let width = document.getElementById("width").value
    let tile = document.getElementById("title").value
    let area = length * width
    let potrzebowanePłytki = Math.ceil(area / tile)
    alert("Potrzebujesz " + potrzebowanePłytki + " płytek.")
}
