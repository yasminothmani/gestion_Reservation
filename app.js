function Id(id) {
  return document.getElementById(id);
}

function Name(name, index) {
  return document.getElementsByName(name)[index];
}
//to check if it is alpha or naah
function isAlpha(myString) {
  for (let i = 0; i < myString.length; i++) {
    if (
      (myString[i].toLowerCase() < "a" || myString[i].toLowerCase() > "z") &&
      myString[i] !== " "
    )
      return false;
  }
  return true;
}

function checkInputs() {
  //initializing an empty string variable that will contain the errors if there's one
  let err = "";
  //checking the first name field !
  //charCodeAt returns the ascii code !

  if (
    Id("first_name").value.charCodeAt(0) < 65 ||
    Id("first_name").value.charCodeAt(0) > 90 ||
    Id("first_name").value.length < 3 ||
    !isAlpha(Id("first_name"))
  ) {
    err += "Name is not valid ! \n";
  }

  if (
    Id("last_name").value.charCodeAt(0) < 65 ||
    Id("last_name").value.charCodeAt(0) > 90 ||
    Id("last_name").value.length < 3 ||
    !isAlpha(Id("last_name").value)
  ) {
    err += "Last Name is not valid ! \n";
  }

  if (Id("email").value.length < 6) {
    err += "Invalid Email \n";
  }
  if (!Name("gender", 0).checked && !Name("gender", 1).checked) {
    err += "You should select The gender  ! \n";
  }
  if (Name("table", 0).selectedIndex === 0) {
    err += "You should select a table ! \n";
  }
  if (err.length > 0) {
    alert(err);
    return false;
  } else {
    return true;
  }
}
