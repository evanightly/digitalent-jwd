const menu = [
    { judul: "Capucino", harga: 35000 },
    { judul: "Green Tea Latte", harga: 40000 },
    { judul: "Fish And Chips", harga: 50000 },
    { judul: "Tuna Sandwich", harga: 45000 },
    { judul: "Mineral Water", harga: 8000 },
    { judul: "French Fries", harga: 18000 },
]

const setElementAttr = (e, attrObj = {}) => {
    for (const key in attrObj) {
        e.setAttribute(key, attrObj[key])
    }
}

menu.forEach((m, i) => {
    const formGroup = document.createElement('div')
    const input = document.createElement('input')
    const label = document.createElement('label')
    const spanJ = document.createElement('span')
    spanJ.innerText = m.judul
    const spanH = document.createElement('span')
    spanH.innerText = `Rp ${m.harga}`

    formGroup.classList = "form-group mb-3 rounded shadow"
    input.classList = "d-none"
    setElementAttr(input, { id: i, type: "checkbox", name: "[pesanan]", value: m.harga })
    label.classList = "form-label d-flex justify-content-between h-100 w-100 bg-light p-2"
    setElementAttr(label, { for: i })

    label.append(spanJ)
    label.append(spanH)

    formGroup.append(input)
    formGroup.append(label)
    document.querySelector('form').append(formGroup)
})


const listMenu = document.querySelectorAll("input")

const modifyClass = (e, classArr = [], type = "remove") => classArr.forEach(c => e.classList[type](c))

const toggleMenu = (e) => {
    const [label] = e.labels
    if (e.checked) {
        modifyClass(label, ["bg-light"])
        modifyClass(label, ["bg-success", "text-light"], "add")
    } else {
        modifyClass(label, ["bg-success", "text-light"])
        modifyClass(label, ["bg-light"], "add")
    }
}

const countTotal = () => {
    const checkedInput = document.querySelectorAll('input[type=checkbox]:checked')
    let total = 0
    checkedInput.forEach(e => total += parseInt(e.value))
    document.querySelector('#total').innerText = total
}

listMenu.forEach(e => {
    e.addEventListener('change', () => {
        toggleMenu(e)
        countTotal()
    })
})