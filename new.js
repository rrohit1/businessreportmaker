var tabButtons = document.querySelectorAll(".tabContainer .buttonContainer button");
    var tabPanels= document.querySelectorAll(".tabContainer .tabPanel");
    
    function showPanel(panelIndex, colorCode){
        tabButtons.forEach(function(node){
                           node.style.backgroundColor="";
                           node.style.color="";
                           });
        tabButtons[panelIndex].style.backgroundColor=colorCode;
        tabButtons[panelIndex].style.color="white";
        tabPanels.forEach(function(node){
            node.style.display="none";
        });
        tabPanels[panelIndex].style.display="block";
        tabPanels[panelIndex].style.backgroundColor=colorCode;
    }
    showPanel(0, '#9C8181');

    
    $('#first_level').multiselect({
        nonSelectedText:'Select Channel',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected= $('#first_level').val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#second_level').html(data);
        $('#second_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked){
        var selected = this.$select.val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#second_level').html(data);
        $('#second_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
    }
    })
    $('#second_level').multiselect({
        nonSelectedText:'Select Market',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_market= $('#second_level').val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        //alert(data);
        $('#third_level').html(data);
        $('#third_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_market.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_market = this.$select.val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
        {
        $('#third_level').html(data);
        $('#third_level').multiselect('rebuild');
        }
        })
        //fetch data at market level
         $.ajax({
         url:"fetch_market.php",
         method:"POST",
         data:{selected_market:selected_market},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#third_level').multiselect({
        nonSelectedText:'Select Trademark',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_trademark = $('#third_level').val();
        if(selected_trademark.length >0)
        {  
        //fetch table data
        $.ajax({
        url:"fetch_trademark.php",
        method:"POST",
        data:{selected_trademark:selected_trademark},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_trademark = this.$select.val();
        if(selected_trademark.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"fetch_trademark.php",
         method:"POST",
         data:{selected_trademark:selected_trademark},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#forth_level').multiselect({
        nonSelectedText:'Select Timestamp',
        buttonWidth:'600px',
        onChange:function(option,checked)
        {
        var Result = this.$select.val();
        if(Result.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"time.php",
         method:"POST",
         data:{Result:Result},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });


//Tab 2
 $('#fifth_level').multiselect({
        nonSelectedText:'Select Channel',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected= $('#fifth_level').val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category_1.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#sixth_level').html(data);
        $('#sixth_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_1.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked){
        var selected = this.$select.val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category_1.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#sixth_level').html(data);
        $('#sixth_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_1.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
    }
    })
    $('#sixth_level').multiselect({
        nonSelectedText:'Select Market',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_market= $('#sixth_level').val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category_1.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        //alert(data);
        $('#seventh_level').html(data);
        $('#seventh_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_market_1.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_market = this.$select.val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category_1.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
        {
        $('#seventh_level').html(data);
        $('#seventh_level').multiselect('rebuild');
        }
        })
        //fetch data at market level
         $.ajax({
         url:"fetch_market_1.php",
         method:"POST",
         data:{selected_market:selected_market},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#seventh_level').multiselect({
        nonSelectedText:'Select Trademark',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_trademark = $('#seventh_level').val();
        if(selected_trademark.length >0)
        {  
        //fetch table data
        $.ajax({
        url:"fetch_trademark_1.php",
        method:"POST",
        data:{selected_trademark:selected_trademark},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_trademark = this.$select.val();
        if(selected_trademark.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"fetch_trademark_1.php",
         method:"POST",
         data:{selected_trademark:selected_trademark},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#eighth_level').multiselect({
        nonSelectedText:'Select Timestamp',
        buttonWidth:'600px',
        onChange:function(option,checked)
        {
        var Result = this.$select.val();
        if(Result.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"time_1.php",
         method:"POST",
         data:{Result:Result},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });

//Tab 3

 $('#ninth_level').multiselect({
        nonSelectedText:'Select Channel',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected= $('#ninth_level').val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category_2.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#tenth_level').html(data);
        $('#tenth_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_2.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked){
        var selected = this.$select.val();
        if(selected.length >0)
        {
        $.ajax({
        url:"fetch_second_level_category_2.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        //alert(data);
        $('#tenth_level').html(data);
        $('#tenth_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_2.php",
        method:"POST",
        data:{selected:selected},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
    }
    })
    $('#tenth_level').multiselect({
        nonSelectedText:'Select Market',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_market= $('#tenth_level').val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category_2.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        //alert(data);
        $('#eleventh_level').html(data);
        $('#eleventh_level').multiselect('rebuild');
    }
    })
            
        //fetch table data
        $.ajax({
        url:"fetch_market_2.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_market = this.$select.val();
        if(selected_market.length >0)
        {
        $.ajax({
        url:"fetch_third_level_category_2.php",
        method:"POST",
        data:{selected_market:selected_market},
        success:function(data)
        {
        $('#eleventh_level').html(data);
        $('#eleventh_level').multiselect('rebuild');
        }
        })
        //fetch data at market level
         $.ajax({
         url:"fetch_market_2.php",
         method:"POST",
         data:{selected_market:selected_market},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#eleventh_level').multiselect({
        nonSelectedText:'Select Trademark',
        buttonWidth:'600px',
        includeSelectAllOption: true,
        enableFiltering: true,
        onSelectAll:function(){
        var selected_trademark = $('#eleventh_level').val();
        if(selected_trademark.length >0)
        {  
        //fetch table data
        $.ajax({
        url:"fetch_trademark_2.php",
        method:"POST",
        data:{selected_trademark:selected_trademark},
        success:function(data)
    {
        $('tbody').html(data);
//        alert(data);
    }
    })
    }
        },
        onChange:function(option,checked)
        {
        var selected_trademark = this.$select.val();
        if(selected_trademark.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"fetch_trademark_2.php",
         method:"POST",
         data:{selected_trademark:selected_trademark},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });
    
    $('#twelth_level').multiselect({
        nonSelectedText:'Select Timestamp',
        buttonWidth:'600px',
        onChange:function(option,checked)
        {
        var Result = this.$select.val();
        if(Result.length >0)
        {
        //fetch data at market level
         $.ajax({
         url:"time_2.php",
         method:"POST",
         data:{Result:Result},
         success:function(data)
        {
         $('tbody').html(data);
              //alert(data);
        }
            });    
        }
        }
    });

