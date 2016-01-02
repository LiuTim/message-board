$(document).ready(function() {

    var Mydialog;

    $( "#message" ).button().on( "click", function() {
	Mydialog = $("#dialog-form").dialog({
            hide:true,              //點擊關閉是隱藏,如果不加這項,關閉彈窗後再點就會出錯
            autoOpen : false,
            resizable : false,
            width : 400,
            height: 600,
            modal : true,
            title : "留言上傳",
            buttons: {
                Submit: function() {
                    var user_name =  $('#name').val();
                    var user_message =  $('textarea#message').val();

                    Cookies.set("Cookie_name",user_name);
                    Cookies.set("Cookie_message",user_message);
                    
                    Mydialog.load("upload_sql.php");

                    Mydialog.dialog( "close" );
                },
                Cancel: function() {
                  Mydialog.dialog( "close" );
                }
            }
        });

        Mydialog.dialog("open");
        Mydialog.load("input_message.html");
        //alert("test");
        return false;
    });
    // 製作 JQuery 對話視窗

    $( "#renew_message" ).button().on( "click", function() {
        $.ajax({
            url: "js/get_data.php",
            type: "GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(Jdata) {
                //alert("SUCCESS!!!");
                $("#message_tbody").append("<tr>"+
                                           "<td>"+Jdata[0]+"</td>"+
                                           "<td>"+Jdata[1]+"</td>"+
                                           "</tr>");         
            },
            error: function() {
                alert("ERROR!!!");
            }
        });
    });  
    //http://blog.xuite.net/ahdaa/blog1/30797195-%5BjQuery%5DjQuery%E5%8F%96%E5%BE%97JSON%E8%B3%87%E6%96%99 
});






//------------------------------------註解區------------------------------------------------------------------

//console.log(Jdata); 列印
//alert("SUCCESS!!!");
//console.log(Jdata[i]);列印
//alert(JSON.stringify(test)); //將物件轉成字串

/*
var test = JSON.stringify(Jdata);
var content = test.split(",");
$("#message_tbody").append("<tr>"+
            "<td>"+content[0]+"</td>"+
            "<td>"+content[1]+"</td>"+
            "</tr>");
*/  