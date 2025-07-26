const validated = {
    email: false,
    age: false
}
document.querySelector("[name=email]").addEventListener("change", function (e) {
    const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/ig

    if (!regex.test(e.target.value) || e.target.value === "") {
        e.target.classList.remove("is-valid");
        e.target.classList.add("is-invalid")
        validated.email = false;
    } else {
        e.target.classList.remove("is-invalid");
        e.target.classList.add("is-valid");
        validated.email = true;
    }
})
document.querySelector("[name=age]").addEventListener("change", function (e) {
    const regex = /^\d+$/ig

    if (!regex.test(e.target.value) || e.target.value === "") {
        e.target.classList.remove("is-valid");
        e.target.classList.add("is-invalid")
        validated.age = false;
    } else {
        e.target.classList.remove("is-invalid");
        e.target.classList.add("is-valid");
        validated.age = true;
    }
})

document.querySelector("[type=submit]").addEventListener("click", function (e) {
    e.preventDefault();
    for (const item in validated) {
        if (!validated[item]) return;
    }
    document.forms[0].submit();
})
const deleteItem = (id) => {
    console.log(id);
}