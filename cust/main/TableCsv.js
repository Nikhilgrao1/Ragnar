export default class {
    /**
     * @param {HTMLTableElement} root The table element which will display the CSV data.
     */
    constructor(root) {
        this.root = root;
    }

    /**
     * Clears the Data and adds new data
     * @param {string[]} data A 2D Array 
     * @param {string[]} headerColumns List of Headings to be used 
     */

    update(data,headerColumns=[]){
        this.clear();
        this.setHeader(headerColumns);
        this.setBody(data);
    }
    
    /**
     * Clears all contents of the tables including headers
     */
    clear(){
        this.root.innerHTML="";
    }

    /**
     * Sets the table header
     * 
     * @param {string[]} headerColumns List of Headings to be used 
     */
    setHeader(headerColumns) {
        this.root.insertAdjacentHTML("afterbegin",`
        
        <thead>
            <tr>
                ${headerColumns.map(text => `<th> ${text} </th>`).join("")}
            </tr>
        </thead>
        
        `);
    }
    /**
     * Sets the table Body
     * 
     * @param {string[]} data A 2D Array  
     */


    setBody(data) {
const rowHtml = data.map(row => {
    return `
        <tr>
            ${row.map(text=> `<td>${text}</td>`).join("")}
        </tr>
        `;
    });

    this.root.insertAdjacentHTML("beforeend",`
        <tbody>
            ${rowHtml.join("")}
        </tbody>    
    `)
    }
}



