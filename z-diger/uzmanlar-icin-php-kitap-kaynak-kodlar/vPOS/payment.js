PAYMENT={
	i:0,
	len:0,
	amountType:' TL',
	idName:'listing',
	amount:0,
	jsonObj:{},
	jsonIndex:0,
	obj:{},
	dataArr:{},
	getTable:function()
	{
		this.tableObj = document.getElementById(this.idName);		
	},
	create:function()
	{
		if (!document.getElementById(this.idName))
		{
			var elem = document.createElement('table');
   			document.getElementById('rateDiv').appendChild(elem);
			elem.setAttribute('id',this.idName);
			elem.className='w';
		}
	},
	getBankRate:function(id,url,totalAmount,vvv)
	{
		if(id=='')
			location.reload(true);

		try{
			document.getElementById('d_1').style.display='none';
			document.getElementById('d_2').style.display='';
		}catch(e){}
		
		this.amount = totalAmount;
		var s='';
		if(vvv==1)
			s="&s=1";
		try 
		{
			this.create();
			if (id=='')
			{
				document.getElementById('payment_transaction_type').value='200';
				this.removeTR();				
			}
			else
			{
				document.getElementById('payment_transaction_type').value='202';
				if (url==0)
				{
					if ( totalAmount >0)
						totalAmount = '&totalAmount='+totalAmount;
					
					AJAX.connection('/index.php?cid=getTermList&bankAccount_id=' + id+totalAmount,'cid=getTermList&bankAccount_id=' + id, PAYMENT.setTable, 'POST');
					
				}
				else
					AJAX.connection('ajax.php?cid=getTermList&bankAccount_id=' + id,'cid=getTermList&bankAccount_id=' + id, PAYMENT.setTable, 'POST');
			}
		}
		catch(e)
		{
			alert(e)
		}
	},
	setTable:function()
	{
		if (http.readyState == 4) 
		{
			if (http.status == 200) 
			{
				try 
				{
					var dataArr = eval("("+http.responseText+");");
					PAYMENT.jsonObj = dataArr;
					PAYMENT.removeTR();
					var i=0;
					var len = dataArr.length-1;
					
					for(i=len;i>=0;i--)
					{
						PAYMENT.addTr(dataArr[i],i);
					}
				}
				catch(e)
				{
				}
			}
		}
	},
	addTr:function(dataArr,loopId)
	{
		this.getTable();
		var innerTable,i,td,len;
		innerTable = this.tableObj.insertRow(0);
		

		var w,html;
		if (loopId>0)
		{
			len=4;
			innerTable.id='row';
		}
		else
		{
			len=3;
			innerTable.className='bottom bb'
		}
		
		if (dataArr.rate=='0')
			innerTable.className='b';
		for (i=0; i < len; i++)
		{
			td = innerTable.insertCell(i);
			switch(i)
			{
				case 0:
					w='40%';
					if (loopId>0)
					{
						if (this.amount>0)
							td.innerHTML= '';
						else 
							td.innerHTML = '<input type="radio" name="term_id" value="'+dataArr.term_id+'" aa="'+dataArr.tot+'" class="radio" onclick="PAYMENT.top(this,'+dataArr.term+')" />';
					}
					else
					{
						td.colSpan=2;
						td.innerHTML = dataArr.term;
					}	
					
					break;
				case 1:
					if (loopId==0)
						td.innerHTML = dataArr.ins+this.amountType;
					else
						td.innerHTML = dataArr.term;
					break;
				case 2:
					if (loopId==0)
						td.innerHTML = dataArr.tot+this.amountType;
					else
						td.innerHTML = dataArr.ins+this.amountType;
					break;
				case 3:
					td.innerHTML = dataArr.tot+this.amountType;
					break;
			}
		}
	},
	removeTR:function()
	{
		this.getTable();
		var tr = this.tableObj.getElementsByTagName('tr');
		var len = tr.length;
		var i;
		for(i=0; i<len; i++)
		{
			this.tableObj.deleteRow(-1);
		}		
	},
	top:function(a,id){
		var f = document.mainForm;
		var am = a.getAttribute('aa');
		PAYMENT.jsonIndex=id;
		try{
			document.getElementById('payment_1').innerHTML = am+ ' TL';
		}catch(e){}
		
		f.amount.value=am;
		var param = 'controle=1&a='+am+
		'&b='+f.okUrl.value+
		'&c='+f.failUrl.value;
		AJAX.connection('/ajax/term.php?'+param,param, PAYMENT.setTop, 'POST');
	},
	getRound:function(amount){
		amount+='';
		var arr = amount.split(".");
		if(arr.length==2){
			return arr[0]+'.'+arr[1].substring(0,2);
		}
		return amount;
	},
	setTop:function(){
		if (http.readyState == 4) 
		{
			if (http.status == 200) 
			{
				try 
				{
					var dd = eval("("+http.responseText+");");
					
					document.mainForm.hash.value=dd.a;
					document.mainForm.rnd.value=dd.b;
					var len = PAYMENT.jsonObj.length;
					for(var i=0;i<len;i++){
						if(PAYMENT.jsonObj[i].term==PAYMENT.jsonIndex)
						{
							var rate = PAYMENT.jsonObj[i].rate;
							var obj = document.getElementById('rowing').getElementsByTagName('tr');
							var l = obj.length;
							var dd,d = '';
							var r = '';
							for(var j=0;j<l;j++){
								if(l==1){
									///alert(document.getElementById('payment_1').innerHTML)
									obj[j].getElementsByTagName('td')[3].innerHTML = document.getElementById('payment_1').innerHTML;
								}else{
									d = obj[j].getElementsByTagName('td')[2].innerHTML;
									r = (1+rate);
									dd = d*r;
									obj[j].getElementsByTagName('td')[3].innerHTML = PAYMENT.getRound(dd);
								}
							}
						}
					}					
				}catch(e){					
				}
			}
		}
	}
}