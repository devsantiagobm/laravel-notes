import { $ } from "../constants/$.js";

class Header {
    constructor() {
        this.setProperties()
        this.handleOnClick();
    }

    setProperties() {
        this.nav = $(".header__nav");
        this.button = $(".header__toggle")
        
    }


    handleOnClick(){
        this.button.addEventListener("click", () => {
            this.nav.classList.toggle("header__nav--active")
        })
    }
}

new Header();