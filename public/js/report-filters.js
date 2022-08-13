

$(document).ready(function(){

    $("#current-data").change(function(){  
        
        $("#center-filter").prop('disabled', true);
        $("#date-filter").prop('disabled', true);
        $("#orderby-id").prop('disabled', true);
        $("#historicalbutton").hide();
        $("#currentbutton").show();
       
        
    });

    $("#filter-report").change(function(){  
        
        $("#center-filter").prop('disabled', false);
        $("#date-filter").prop('disabled', false);
        $("#orderby-id").prop('disabled', false);
        $("#historicalbutton").show();
        $("#currentbutton").hide();
    });

    $("#center-filter").change(function(){  

        var center = $("#center-filter").val();
        var hrefHistorical = $("#historicalbutton").attr('href');
        var centerFilter = hrefHistorical.search("center");
        var operatorAnd = hrefHistorical.search("&");
        var operatorInterrogation = hrefHistorical.search("\\?");
        //var orderby = hrefHistorical.search("orderby");

        if (centerFilter == -1 && operatorAnd == -1 && operatorInterrogation == -1){
            var link = hrefHistorical + "?center=" + encodeURI(center);
            $("#historicalbutton").attr("href", encodeURI(link));
        }else if (centerFilter == -1  && operatorInterrogation != -1){

            var link = hrefHistorical + "&center=" + encodeURI(center);
            $("#historicalbutton").attr("href", encodeURI(link));
        }else if (centerFilter != -1){
            
            var splitInterrogation = hrefHistorical.split("?");
            var andFilter = splitInterrogation[1].search("&");

            if (andFilter == - 1){
                var link = splitInterrogation[0] + "?center=" + encodeURI(center);
                $("#historicalbutton").attr("href", encodeURI(link));

            }else{
                var yy = splitInterrogation[1].split("&");
                var link = splitInterrogation[0] +"?";
           
                for(let i = 0 ; i < yy.length;i ++){

                    var splitEqual = yy[i].split("=");
              
                    if (splitEqual[0] == "center"){
                        link = link +  "center=" + encodeURI(center);
                    }else{
                        link = link + yy[i];
                    }

                    if ( i + 1 != yy.length){
                        link = link + "&"
                    }

                }
                $("#historicalbutton").attr("href", encodeURI(link));
             
            }

         
            
            console.log(splitInterrogation);
         
              

        }
       
    });

    $("#orderby-id").change(function(){  

        var order = $("#orderby-id").val();
        var hrefHistorical = $("#historicalbutton").attr('href');
        var orderby = hrefHistorical.search("orderby");
        var operatorAnd = hrefHistorical.search("&");
        var operatorInterrogation = hrefHistorical.search("\\?");

        if (orderby == -1 &&  operatorAnd == -1 && operatorInterrogation == -1 ){
            var link = hrefHistorical + "?orderby=" + (order);
            $("#historicalbutton").attr("href", (link));
        }else if (orderby == -1 && operatorInterrogation != -1){
            var link = hrefHistorical + "&orderby=" + (order);
            $("#historicalbutton").attr("href", (link));
        }else if (orderby != -1){

            var splitInterrogation = hrefHistorical.split("?");
            var andFilter = splitInterrogation[1].search("&");

            if (andFilter == - 1){
                var link = splitInterrogation[0] + "?orderby=" + (order);
                $("#historicalbutton").attr("href", (link));

            }else{
                var yy = splitInterrogation[1].split("&");
                var link = splitInterrogation[0] +"?";
           
                for(let i = 0 ; i < yy.length;i ++){

                    var splitEqual = yy[i].split("=");
              
                    if (splitEqual[0] == "orderby"){
                        link = link +  "orderby=" + (order);
                    }else{
                        link = link + yy[i];
                    }

                    if ( i + 1 != yy.length){
                        link = link + "&"
                    }

                }
                $("#historicalbutton").attr("href", (link));
             
            }


        }
      
    });

    $("#date-filter").change(function(){  

        var date = $("#date-filter").val();
        var hrefHistorical = $("#historicalbutton").attr('href');
        var dateBan = hrefHistorical.search("date");
        var operatorAnd = hrefHistorical.search("&");
        var operatorInterrogation = hrefHistorical.search("\\?");

        if (dateBan == -1 &&  operatorAnd == -1 && operatorInterrogation == -1 ){
            var link = hrefHistorical + "?date=" + encodeURI(date);
            $("#historicalbutton").attr("href", (link));
        }else if (dateBan == -1 && operatorInterrogation != -1){
            var link = hrefHistorical + "&date=" + encodeURI(date);
            $("#historicalbutton").attr("href", (link));
        }else if (dateBan != -1){

            var splitInterrogation = hrefHistorical.split("?");
            var andFilter = splitInterrogation[1].search("&");

            if (andFilter == - 1){
                var link = splitInterrogation[0] + "?date=" + encodeURI(date);
                $("#historicalbutton").attr("href", (link));

            }else{
                var yy = splitInterrogation[1].split("&");
                var link = splitInterrogation[0] +"?";
           
                for(let i = 0 ; i < yy.length;i ++){

                    var splitEqual = yy[i].split("=");
              
                    if (splitEqual[0] == "date"){
                        link = link +  "date=" + encodeURI(date);
                    }else{
                        link = link + yy[i];
                    }

                    if ( i + 1 != yy.length){
                        link = link + "&"
                    }

                }
                $("#historicalbutton").attr("href",(link));
             
            }


        }
      
    });


    


    $("#historicalbutton").click(function() {
        console.log("kimetsu");
    });

});