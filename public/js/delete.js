const confirmDel = (e) => {

    e.preventDefault()
    //console.log()
    const token = document.querySelector('[name=_token]').value
    
    swal({
        title: "Você tem certeza?",
        text: "Se você deletar não terá como restaurar sua enquete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            fetch(e.target.href, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-Token': token
                },
                credentials: 'same-origin'
            }).then(() =>
                swal({
                    title: "Você deletou sua enquete",
                    icon: "error"
                }).then(()=>{
                    window.location.href = "survey"
                }))
        }
    })
}

window.onload = () => {
    if (true) {
        let btn = document.querySelectorAll('.btn-delete')
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel)
        }
    }
}

