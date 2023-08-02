import { $ } from "../constants/$.js";

class NewNote {
    constructor() {
        this.setProperties()
        this.setDefaultSelected()
        this.handleOpenSelect()
        this.handleChange()
    }

    setProperties() {
        this.fakeSelect = $(".form__input--select");
        this.optionsBox = $(".form__select-box-shown")
        this.options = $(".form__option")
        this.selectText = $(".form__select-text")
        this.select = $("#form__select");
        this.defaultOptionSelected = $(".form__option--active")
    }

    setDefaultSelected() {
        if (this.defaultOptionSelected) this.selectText.innerText = this.defaultOptionSelected.innerText
    }

    handleOpenSelect() {
        this.fakeSelect.addEventListener("click", e => {
            const isOpen = e.currentTarget.classList.contains("form__input--select--open");

            if (isOpen) {
                this.optionsBox.style.maxHeight = 0;
                e.currentTarget.classList.remove("form__input--select--open")
            }
            else {
                this.optionsBox.style.maxHeight = this.optionsBox.scrollHeight + 8 + "px";// For some reason, when select isOpen, the window doesnt show 100%, thats why + 8
                e.currentTarget.classList.add("form__input--select--open")
            }
        })
    }

    handleChange() {
        this.options.forEach(option => {
            option.addEventListener("click", e => {
                const textSelected = e.currentTarget.innerText
                const valueSelected = e.currentTarget.dataset.value

                this.selectText.innerText = textSelected
                this.select.value = valueSelected

                this.defaultOptionSelected.classList.remove("form__option--active")
                e.currentTarget.classList.add("form__option--active");
                this.defaultOptionSelected = e.currentTarget
            })
        })
    }
}

new NewNote();