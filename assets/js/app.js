// Trocar a cor do select
const Inputs = {
    changeColorSelect() {
        const select = document.querySelector("#status")
        const selectValue = select.value

        selectValue ? select.style.color = "white" : select.style.color = "#687575"

    }
}

document.querySelector('select').addEventListener("click", (e) => {
    Inputs.changeColorSelect()
})
