const tasksTBody = document.getElementById("tasks-tbody");

$("#create-form").on("submit", (event) => {
    event.preventDefault();

    let newTask = {
        title: $("#title").val(),
        description: $("#description").val(),
        priority: $("#priority").val(),
        deadline: $("#deadline").val().replace("T", " "),
        status: $("#status").is(":checked") ? 1 : 0 
    }

    $.ajax({
        url: window.location.origin + "/src/create_task.php",
        method: "POST",
        data: newTask,
        dataType: "json"
    }).done((response) => {
        toggleCreateTaskForm();
        clearCreateTaskForm();
        tasksTBody.insertAdjacentHTML('beforeend', response);
    });
});

function get_tasks() {
    $.ajax({
        url: window.location.origin + "/src/get_tasks.php",
        method: "GET",
        dataType: "json"
    }).done(function (response) {
        tasksTBody.innerHTML = response.join("\n");
    })
}

get_tasks();