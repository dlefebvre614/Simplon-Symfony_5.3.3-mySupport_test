window.onload = () => {
    let btdeletes = document.querySelectorAll(".modal-trigger")
    for (let btdelete of btdeletes) {
        btdelete.addEventListener("click", function () {
            document.querySelector(".modal-footer a").href = `/administrator/post/delete/${this.dataset.id}`
            document.querySelector(".modal-body").innerText = `Are you sure you want to delete the post "${this.dataset.title}"`
        })
    }
}