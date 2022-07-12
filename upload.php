<?php
  include_once 'include/headerall.php'
?>

<style>

  .center {
    margin-left: auto;
    margin-right: auto;
  }

  table {
    border-collapse: collapse;
    border-radius: 5px;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    font-family: "Quicksand", sans-serif;
    font-weight: bold;
    font-size: 14px;
  }

  th {
    background: #009578;
    color: #ffffff;
    text-align: left;
  }

  th,
  td {
    padding: 10px 20px;
  }

  tr:nth-child(even) {
    background: #eeeeee;
  }
</style>

<title>Upload Data</title>

<form action="db/insert.php"  method="POST" enctype="multipart/form-data">
  <section id="services">
    <div class="container">
      <h1 class="text-center">Upload Data Form Approach</h1>
      <?php
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "FailedColumnsDontmatch") {
              echo "<p> Upload Failed !</p>";
            }
            else if ($_GET["error"] == "Failedtablemissmatch") {
              echo "<p> Upload Failed !</p>";
            }
            else if ($_GET["error"] == "UploadSuccessful") {
              // Need to Redirect to Index.html
              echo "<p> Upload Successfull.</p>";
            }
            
            else if ($_GET["error"] == "Failed") {
              // Need to Redirect to Index.html
              echo "<p>Upload Failed. Unknown error.</p>";
            }
          }
        ?>
      <div class="row">

        <div class="col-lg-3 mt-4">
          <div class="card servicesText">
              <div class="card-body">
              <h4 class="card-title mt-3">Project</h4>
              <div class="custom-select">
                  <select id="level1" name="project">
                  </select>
              </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 mt-4">
          <div class="card servicesText">
              <div class="card-body">
              <h4 class="card-title mt-3">Tower</h4>
              <div class="custom-select">
                  <select id="level2" name="tower">
                  </select>
              </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 mt-4">
          <div class="card servicesText">
            <div class="card-body">
              <h4 class="card-title mt-3">Department</h4>
              <div class="custom-select">
                  <select id="level3" name="SBU" >
                  </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 mt-4">
            <div class="card servicesText">
              <div class="card-body">
                <h4 class="card-title mt-3">Table</h4>
                <div class="custom-select">
                  <select id="level4" name="table_name">
                  </select>
                  <div class="button-cont">
                    <button class="button button2"  name="download_button" value = 'templet'>Download Templet</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <div class="row">
          <div class="col-lg-12 mt-4">
            <div class="card servicesText">
              <div class="card-body">
                <div class="custom-select">
                  <input type="file" id="csvFileInput" style="padding-bottom : 0px" accept=".csv" name="Upload_File"> 
                  <!-- required = "required" -->
                  <div class="button-cont">
                    <button class="button button2" type="submit" name="submit_button" value = 'upload'>Upload Data</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
        
    </div>
  </section>
</form>

<div class="outer-wrapper-table">
  <div class="table-wrapper">
      <table id="csvRoot" class = "center"></table>
  </div>
</div>


<script>
  // call ajax
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url  = "data.php";
  var asynchronous = true;

  ajax.open(method, url, asynchronous);
  //sending ajax request
  ajax.send();

  //receiving response from data.php

  ajax.onreadystatechange = function()
  {
    if (this.readyState == 4 && this.status == 200)
    {
      // converting JSON Back to an array
      var data = JSON.parse(this.responseText);
      var myData = [];
      for (var i=0; i<data.length; i++){
        var temp = [];
        for(var k in data[i]){
          if (!temp.includes(data[i][k])){
            temp.push(data[i][k]);
          }         
        }
        myData.push(temp);
      }
      // Here is the completed data base
      // console.log("1");
      // console.log(myData);
      function makeDropDown(data, filtersAsArray, targetElement) {

        const filteredArray = filterArray(data, filtersAsArray);
        const uniqueList = getUniqueValues(filteredArray, filtersAsArray.length);
        populateDropDown(targetElement, uniqueList);
        }

      function applyDropDown() {
        const selectLevel1Value = document.getElementById("level1").value;
        const selectLevel2 = document.getElementById("level2");
        makeDropDown(myData, [selectLevel1Value], selectLevel2);
        applyDropDown2();
        }

      function applyDropDown2() {
        const selectLevel1Value = document.getElementById("level1").value;
        const selectLevel2Value = document.getElementById("level2").value;
        const selectLevel3 = document.getElementById("level3");
        makeDropDown(myData, [selectLevel1Value, selectLevel2Value], selectLevel3);
        applyDropDown3();
        }

      function applyDropDown3() {
        const selectLevel1Value = document.getElementById("level1").value;
        const selectLevel2Value = document.getElementById("level2").value;
        const selectLevel3Value = document.getElementById("level3").value;
        const selectLevel4 = document.getElementById("level4");
        makeDropDown(myData, [selectLevel1Value, selectLevel2Value, selectLevel3Value], selectLevel4);
        applyDropDown4();
        }

      function afterDocumentLoads() {
        populateFirstLevelDropDown();
        applyDropDown();
        }

      function getUniqueValues(data, index) {
        const uniqueOptions = new Set();
        data.forEach(r => uniqueOptions.add(r[index]));
        return [...uniqueOptions];
        }

      function populateFirstLevelDropDown() {
        const uniqueList = getUniqueValues(myData, 0);
        const el = document.getElementById("level1");
        populateDropDown(el, uniqueList);
        }

      function populateDropDown(el, listArray) {
        el.innerHTML = "";
        listArray.forEach(item => {
          const option = document.createElement("option");
          option.textContent = item;
          el.appendChild(option);
        });
        }

      function filterArray(data, filtersAsArray) {
        return data.filter(r => filtersAsArray.every((item, i) => item === r[i]));
        }

        document.getElementById("level1").addEventListener("change", applyDropDown);
        document.getElementById("level2").addEventListener("change", applyDropDown2);
        document.getElementById("level3").addEventListener("change", applyDropDown3);
        afterDocumentLoads();
        // document.addEventListener("DOMContentLoaded", afterDocumentLoads);
    }
  }
</script>

<script>
  class TableCsv {
    /**
     * @param {HTMLTableElement} root The table element which will display the CSV data.
     */
    constructor(root) {
      this.root = root;
    }

  /**
   * Clears existing data in the table and replaces it with new data.
   *
   * @param {string[][]} data A 2D array of data to be used as the table body
   * @param {string[]} headerColumns List of headings to be used
   */
  update(data, headerColumns = []) {
    this.clear();
    this.setHeader(headerColumns);
    this.setBody(data);
  }

  /**
   * Clears all contents of the table (incl. the header).
   */
  clear() {
    this.root.innerHTML = "";
  }

  /**
   * Sets the table header.
   *
   * @param {string[]} headerColumns List of headings to be used
   */
  setHeader(headerColumns) {
    this.root.insertAdjacentHTML(
      "afterbegin",
      `
            <thead>
                <tr>
                    ${headerColumns.map((text) => `<th>${text}</th>`).join("")}
                </tr>
            </thead>
        `
    );
  }

  /**
   * Sets the table body.
   *
   * @param {string[][]} data A 2D array of data to be used as the table body
   */
  setBody(data) {
    const rowsHtml = data.map((row) => {
      return `
                <tr>
                    ${row.map((text) => `<td>${text}</td>`).join("")}
                </tr>
            `;
    });

    this.root.insertAdjacentHTML(
      "beforeend",
      `
            <tbody>
                ${rowsHtml.join("")}
            </tbody>
        `
    );
  }
  }

  const tableRoot = document.querySelector("#csvRoot");
  const csvFileInput = document.querySelector("#csvFileInput");
  const tableCsv = new TableCsv(tableRoot);

  csvFileInput.addEventListener("change", (e) => {
    Papa.parse(csvFileInput.files[0], {
      delimiter: ",",
      skipEmptyLines: true,
      complete: (results) => {
        tableCsv.update(results.data.slice(1), results.data[0]);
      }
    });
  });

</script>



<?php
include_once 'include/footerall.php'
?>