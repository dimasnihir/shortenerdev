<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <LINK rel="stylesheet" href="/public/css/style.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=$this->getMeta();?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">

    <title>URL shortener</title>

</head>
<body>
<!-- Начало уведомления Copied -->
<div class="alert alert-success alert-copy d-flex flex-row align-items-center" role="alert">
    <span>
      <img src="/public/img/check-circle.svg" alt="">
    </span>
    <span>&nbsp&nbsplink copied!</span>
</div>


<!-- Конец уведомления Copied -->

<!-- Start navbar -->
<nav class="navbar justify-content-between">
    <div class="container">
        <span class="navbar-brand">Shortener</span>
        <button class="btn btn-primary" type="submit">admin</button>
    </div>
</nav>
<!-- End navbar -->


<?=$content;?>

</body>

<script src="/public/js/bootstrap.js"></script>

<!-- Скрипт копирования короткой ссылки -->
<script>
    function copy() {
        var copyText = document.querySelector('#short-link').textContent;


        let textarea = document.createElement('textarea');
        textarea.id = 'temp';
        textarea.style.position = 'absolute';
        textarea.style.opacity = 0;
        textarea.style.height = 0;

        document.body.appendChild(textarea);
        textarea.value = copyText;

        let selector = document.querySelector('#temp');
        selector.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);


        let alertCopy = document.querySelector('.alert-copy');
        alertCopy.classList.add('show');

        setTimeout(function(){
            alertCopy.classList.remove('show');
        }, 1000)
    }
    let buttonCopy = document.querySelector('#button-copy');
    if (buttonCopy) {
        buttonCopy.addEventListener('click', copy);
    }

</script>

<!--<script>-->
<!--    let form = document.querySelector('.js-validation');-->
<!--    let inputLink = document.querySelector('.js-longLink');-->
<!---->
<!--    form.onsubmit = function () {-->
<!---->
<!--        const isValidUrl = urlString=> {-->
<!--            let urlPattern = new RegExp('^(https?:\\/\\/)'+ // validate protocol-->
<!--                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name-->
<!--                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address-->
<!--                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path-->
<!--                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string-->
<!--                '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator-->
<!--            return !!urlPattern.test(urlString);-->
<!--        }-->
<!---->
<!--        console.log(inputLink.value);-->
<!--        if (!isValidUrl(inputLink.value)) {-->
<!--            console.log('work');-->
<!--            let alertLinkError = document.querySelector('.alertErrorLink');-->
<!--            alertLinkError.classList.add('showErrorLink');-->
<!---->
<!--            setTimeout(function(){-->
<!--                alertLinkError.classList.remove('showErrorLink');-->
<!--            }, 3000)-->
<!---->
<!--            return false;-->
<!--        }-->
<!---->
<!--    }-->
<!--</script>-->

</html>
