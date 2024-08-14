var ROW = Object();
ROW.tableName = 'listing';
ROW.startRow = 0;
ROW.colorArr = new Array('#F1F1F1','#F9F9F9');
ROW.colorIndex=0;
ROW.addTR = function(start,fname,lname,mail)
{
    var table = document.getElementById(this.tableName);
    var tr = table.insertRow(1);	
    tr.insertCell(0).innerHTML = start;
    tr.insertCell(1).innerHTML = fname;
    tr.insertCell(2).innerHTML = lname;
    tr.insertCell(3).innerHTML = mail;
    var color;
    if(this.startRow%2==0)
       color=this.colorArr[0];
    else
       color=this.colorArr[1];
    tr.style.backgroundColor=color;
    this.startRow++;
}
ROW.removeTR = function()
{
    var obj = document.getElementById(this.tableName);	
    for(var i = obj.rows.length; i > 0;i--)
    {
       if(obj.rows[i-1].getAttribute('id')!='title')
          obj.deleteRow(i-1);
    }
    this.startRow=0;
}
