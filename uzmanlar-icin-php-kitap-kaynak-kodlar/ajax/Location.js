L.location={
  startUpControle:false,
  idObj:[],
  urlParam:'',
  id:0,
  formName:'',
  selectboxIndex:0,
  onChangeArr:new Array(),
  selectedArr:new Array(),
  allLocationJson:new Array({},{}),
  /**
   * 0 olduğunda city_id ileri çağırır
   * 1 olduğunda ise birth olanları çağırır
   */
  controleIndex:0,
  startUp:function(){
    var idArr = new Array('city_id','district_id','birth_city_id','birth_district_id');
    try{
      if(this.formName==''){
        if(L.location.idObj.length==0){
          var len = idArr.length;
          for(var i=0;i<len;i++){
            if(document.getElementById(idArr[i]))
              L.location.idObj[i] = document.getElementById(idArr[i]);
          }
        }
        L.location.startUpControle=true;
      }
      else{
        if(L.location.idObj.length==0){
          var len = idArr.length;
          for(var i=0;i<len;i++){
            if(document[this.formName][idArr[i]])
              L.location.idObj[i] = document[this.formName][idArr[i]];
          }
        }
        L.location.startUpControle=true;				
      }
    }
    catch(e){
      L.location.startUpControle=false;
      alert("Hata"+e)
      return false;
    }
  },
  getLocation:function(type,theValue){
    if (theValue=='')
      return false;
    switch(type){
    // şehir
      case 1:
        L.cookie.setCookie('country_id',theValue,30);
        this.id=type;
        break;
    // ilçe
      case 2:			
        this.id=type;				
        break;
      case 3:
        this.id=type;
        break;
      case 4:
        this.id=type;
        break;
      case 5:
        this.id=type;
        break;
      default:
        alert('Bilinmeyen bir tip');
        return false;
        break;
    }
    this.urlPush('level=3');
    this.urlPush('location_id='+theValue);
    this.opener();
    return true;
  },
  urlPush:function(data){
    this.urlParam +=data+'&';
  },
  urlFlush:function(){
    this.urlParam="";
  },
  removeOption:function(id){
    if (this.startUpControle==false)
      this.startUp();
    return this.idObj[id].length = 0;	
  },
  add:function(id,theText, theValue,selected,classVal){
    var newOpt,className;
    if (selected=='t')
      selected = true;
    else
      selected = false;
    id = this.selectboxIndex+id;
    if ( theValue.slice(9,12) == '000')
      newOpt = new Option(theText, theValue,selected);
    else
      newOpt = new Option(theText, theValue,selected);
    var selLength = this.idObj[id].length;
    this.idObj[id].options[selLength] = newOpt;
  },
  firstSelectText:function(id){
    return L.location.idObj[id].options[0].text;
  },
  addOption:function(){		
    if(http.readyState == 4){
      if(http.status == 200){
        var selected='';
        var data = '';				
        L.location.startUp();
        var id = L.location.id-1;				
        try {
          if(http.responseText){						
            data = eval('(' + http.responseText + ');');				
            var firstText = L.location.firstSelectText(id);	
            /* select içini boşalt */
            L.location.removeOption(id);
            /* seçinizi ekle */
            L.location.add(id,firstText,'');						
            if ( L.location.idObj[id] ){		
              var i=1;
              while(i<=data.s.length){
                L.location.add(id, data.s[i-1].d.t, data.s[i-1].d.v, data.s[i-1].d.s);
                if ( data.s[i-1].d.s == 't' )
                  selected = data.s[i-1].d.v;
                i++;
              }
            }
            L.location.urlFlush();
          }
        }
        catch(ex){
          alert(ex)
        }
      }
    }
  },
  opener:function(){
    return L.AJAX.connection('/ajax/getLocation.php',this.urlParam,L.location.addOption,'POST');
  },
  changeSelect:function(controle,i){
    this.startUp();
    var chang,func;			
    if(controle){	
      for(this.i=0;this.i<2;this.i++){
        this.onChangeArr[this.i] = this.idObj[this.i].onchange;
        this.idObj[this.i].onchange = function(){}
      }
      return true;
    }
    else{
      try{
        this.idObj[i].onchange=this.onChangeArr[i];
      }catch(e){}
      return true;
    }
  },
  /*
   * selectbox'ların onchange'deki function'ları kaldırıp onChangeArr dizisine fonksiyonları aktarır
   * freeSelect() fonksiyonunda da değiştirdiği onchange alanları eski haline getirir.
   * bunun sebebi, tüm veriler sayfa içerisinde ki json ile dolaraken onchange'de ajax'ı tetiklememeden yapmaktır.
   */
  allLoation:function(){
    this.changeSelect(true);
    var i=0;
    while (i<2){
      this.selectAddOption(i);
      i++;
    }
    return true;		
  },
  selectAddOption:function(selectId){	
    var index = selectId;
    if(this.controleIndex==1)
      index = selectId+2;
    this.len = this.allLocationJson[this.controleIndex].s[selectId].length;
    if(this.len>0){
      for(this.i=0;this.i<this.len;this.i++){
        this.add(index,this.allLocationJson[this.controleIndex].s[selectId][this.i].l.t,this.allLocationJson[this.controleIndex].s[selectId][this.i].l.v);
      }			
      return true;
    }
  },
  freeSelect:function(){
    this.changeSelect(false,0);
    this.changeSelect(false,1);
  }
}
