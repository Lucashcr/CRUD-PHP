function toggleCreateTaskForm() {
    let createForm = document.getElementById("create-form");
    createForm.hidden = !createForm.hidden;
}

function clearCreateTaskForm() {
    document.getElementById("title").value = "";
    document.getElementById("description").value = "";
    document.getElementById("priority").value = "low";
    document.getElementById("deadline").value = "";
    document.getElementById("status").checked = false;
}