$('document').ready(function(){
    
    $('button[name="unstuck"]').on('click', function(){
        let $this = $(this)
        $this.button('loading')
          
        let charId = $('#boneco').val()
            
            
        $.post('controller/casePost.php', {action: 'unstuck', id: charId}, function(data){
            console.log(data)
            $('#alert-unstuck').html(data)
            $('#alert-unstuck').show()
            setTimeout(function() {
                $("#alert-unstuck").fadeOut('slow', function(){$(this).html('')})
                $this.button('reset')
            }, 2000);
        })
    })
    
    $('button[name="disconnect"]').on('click', function(){
        let $this = $(this)
        $this.button('loading')
        
        $.post('controller/casePost.php', {action: 'dc'}, function(data){
            console.log(data)
            $('#alert-dc').html(data)
            $('#alert-dc').show()
            setTimeout(function() {
                $("#alert-dc").fadeOut('slow', function(){$(this).html('')})
                $this.button('reset')
            }, 2000);
        })
    })
    
    function clean_reg(type){
        setTimeout(function() {
            $('#alert_' + type).fadeOut('slow', function(){
               $('#alert_' + type).html('')
            })
        }, 5000);
    }
    
    
    $('.unstuck > .boneco:first').addClass('selected')
    
    $('.unstuck > .boneco').on('click', function(){
        $('.unstuck > .boneco').removeClass('selected')
        $(this).addClass('selected')
    })
    
    $('.buy > .boneco:first').addClass('selected')
    
    $('.buy > .boneco').on('click', function(){
        $('.buy > .boneco').removeClass('selected')
        $(this).addClass('selected')
    })
    
    if($('.meso').find('p')){
        $('#transfer_form').remove()
        $('#footer_transfer').remove()
    }
    
    if($('.buy').find('p')){
        $('#form_nx').remove()
        $('#footer_buy').remove()
    }
    
    if($('.unstuck').find('p')){
        $('select[name="map"]').remove()
        $('#footer_unstuck').remove()
    }
})