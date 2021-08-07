window.onload = () => { // console.log("coucou")
    let activate = document.querySelectorAll("[type=checkbox]")
    //console.log(activate)
    for (let button of activate) { // console.log(button)
        button.addEventListener("click", function () {
            // console.log("Clic !")
            // alert("Clic !")
            let xmlhttp = new XMLHttpRequest
            xmlhttp.open("get", `${this.dataset.id}`)
            xmlhttp.send()
            // . then (data ==> console(data.data))
        })
    }
}