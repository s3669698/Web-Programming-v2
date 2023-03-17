function checkSubmit() {
    select_element = document.querySelector("#category");
    v = select_element.value;
    if (v == "") {
      alert('You must select a categories');
      return false;
    }
    return true;
  }