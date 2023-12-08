

class Message extends HTMLElement {

    constructor() {
        super() 
    }

    connectedCallback() {
       
        const timer=setTimeout(()=> {
            if(getComputedStyle(this).display!=='none') {
                this.style.display='none'
            }
        },6000)

        const onClick=()=> {
            if(getComputedStyle(this).display!=='none') {
                this.style.display='none'
                clearInterval(timer)
            }
        }


        this.addEventListener('click',onClick)

        //console.log(getComputedStyle(this).display);
    
    }

    disconnectedCallback() {

    }



}

customElements.define('flash-message',Message,{extends:'section'})