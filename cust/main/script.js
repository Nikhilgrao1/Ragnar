import TableCsv from "./TableCsv.js"; 
const tableRoot = document.querySelector("#csvRoot");
const tableCsv = new TableCsv(tableRoot);
const csvFileInput = document.querySelector('#csvFileInput');


csvFileInput.addEventListener("change", (e) => {
  Papa.parse(csvFileInput.files[0], {
    delimiter: ",",
    skipEmptyLines: true,
    complete: (results) => {
      console.log(results);
      tableCsv.update(results.data.slice(1), results.data[0]);
    }
  });
});




