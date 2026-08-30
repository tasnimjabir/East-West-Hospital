function showUpdateForm(id) {
    const updateForm = document.getElementById("update-form-"+id);
    if(updateForm.style.display == "none")
        updateForm.style.display = "block";
    else
        updateForm.style.display = "none";
}