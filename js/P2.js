const table = document.querySelector(".students-table");
const container = document.querySelector(".table-container");

const detail_table = document.querySelector(".detail-table");
const details = document.querySelector(".details-container");

details.appendChild(detail_table);

function viewStudent(event) {
  const link = event.target.parentNode.parentNode.firstChild.innerHTML;
  window.location.href = "../dist/P2.php?sid=" + link;

  details.style = "visibility:visible";
  console.log(link);
}
