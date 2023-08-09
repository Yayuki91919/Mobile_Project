$(document).ready(function(){
    console.log('in script')
$('#mytable').DataTable()
    
    $(document).on('click','.delete_user',function(){
        let status=confirm("Are you sure to delete?");
        
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method: 'post',
                url:'delete_user.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        alert("Successfully deleted")
                        location.href='admin.php'
                    }
                    else{
                        alert(response)
                    }
                },
                error: function(error)
                {
                    
                }
            })
            
        }
    })
    
    $(document).on('click','.delete_package',function(){
        let status=confirm("Are you sure to delete?");
        
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method: 'post',
                url:'delete_package.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        alert("Successfully deleted")
                        location.href='app_package.php'
                    }
                    else{
                        alert(response)
                    }
                },
                error: function(error)
                {
                    
                }
            })
            
        }
    })
    $(document).on('click','.delete_tutorial',function(){
        let status=confirm("Are you sure to delete?");
        
        if(status)
        {
            let id=$(this).parent().attr('id')
            $.ajax({
                method: 'post',
                url:'delete_tutorial.php',
                data:{id:id},
                success:function(response){
                    if(response=='success')
                    {
                        alert("Successfully deleted")
                        location.href='app_tutorial.php'
                    }
                    else{
                        alert(response)
                    }
                },
                error: function(error)
                {
                    
                }
            })
            
        }
    })
    

})

