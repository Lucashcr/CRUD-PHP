function toggleTaskForm(method) {
    let form = document.getElementById(`${method}-form`);
    form.hidden = !form.hidden;
}

function clearTaskForm(form) {
    document.getElementById(`${form}-title`).value = "";
    document.getElementById(`${form}-description`).value = "";
    document.getElementById(`${form}-priority`).value = "low";
    document.getElementById(`${form}-deadline`).value = "";
    document.getElementById(`${form}-status`).checked = false;
}

function editTask(id) {
    console.log("edit task " + id);
}

async function deleteTask(id) {
    document.getElementById("delete-id").value = id;
    let task = await fetch(window.location.origin + "/src/get_task.php?id=" + id)
        .then(response => response.json());
    document.getElementById("delete-title").value = task.title;
    document.getElementById("delete-description").value = task.description;
    document.getElementById("delete-priority").value = task.priority;
    document.getElementById("delete-deadline").value = task.deadline;
    document.getElementById("delete-status").value = task.status;
    toggleTaskForm('delete');
}