let form = document.querySelector('.js-validation');
let inputLink = document.querySelector('.js-longLink');

form.onsubmit = function () {

    const isValidUrl = urlString=> {
        let urlPattern = new RegExp('^(https?:\\/\\/)?'+ // validate protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
            '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator
        return !!urlPattern.test(urlString);
    }

    console.log(inputLink.value);
    if (!isValidUrl(inputLink.value)) {
        console.log('work');
        let alertLinkError = document.querySelector('.alertErrorLink');
        alertLinkError.classList.add('showErrorLink');

        setTimeout(function(){
            alertLinkError.classList.remove('showErrorLink');
        }, 3000)

        return false;
    }

}