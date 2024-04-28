const form = document.getElementById("form");
const productName = document.getElementById("productName");
const category = document.getElementById("category");
const manufacturingDate = document.getElementById("manufacturingDate");

productName.addEventListener("input", function () {
  if (productName.value.trim() !== "") {
    document.getElementById("productNameError").innerText = "";
  }
});

category.addEventListener("input", function () {
  if (category.value.trim() !== "") {
    document.getElementById("categoryError").innerText = "";
  }
});

manufacturingDate.addEventListener("input", function () {
  if (manufacturingDate.value.trim() !== "") {
    document.getElementById("manufacturingDateError").innerText = "";
  }
});

form.addEventListener("submit", function (e) {
  if (productName.value.trim() === "") {
    document.getElementById("productNameError").innerText =
      "*Enter the product name";
    productNameError.style.color = "red";
    e.preventDefault();
  }

  if (category.value.trim() === "") {
    document.getElementById("categoryError").innerText =
      "*Enter the category name";
    categoryError.style.color = "red";
    e.preventDefault();
  }

  if (manufacturingDate.value.trim() === "") {
    document.getElementById("manufacturingDateError").innerText =
      "*Enter the manufacturingDate";
    manufacturingDateError.style.color = "red";
    e.preventDefault();
  }
});
