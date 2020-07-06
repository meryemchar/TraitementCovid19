<style>
.flashy {
    font-family: "Open Sans", sans-serif;
    padding: 11px 30px;
    border-radius: 4px;
    font-weight: 400;
    position: fixed;
    bottom: 70px;
    right: 20px;
    font-size: 16px;
    color: #fff;
}

.flashy--success {
    background-color: #2E8B57;
    color: #fff;
}

.flashy--warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
}

.flashy--muted {
    background: #eee;
    color: #3a3a3a;
    border: 1px solid #e2e2e2;
}

.flashy--muted-dark {
    background: #133259;
    color: #e2e1e7;
}

.flashy--info a,
.flashy--primary-dark a {
    color: #fff;
}

.flashy--error {
    background: #FF6347;
    color: #fff;
}

.flashy--primary {
    background: #573e81;
}

.flashy--primary-dark {
    background: linear-gradient(to right, #133259 30%, #0d233e);
}

.flashy--info {
    background: #9ACD32;
}

.flashy > ul {
    padding-left: 15px;
}

.flashy > p:only-of-type {
    margin-bottom: 0;
}

.flashy i {
    margin-right: 8px;
    position: relative;
    top: 6px;
}

.flashy .flashy__body {
    color: inherit;
}

@media only screen and (max-width:1050px) {
    .flashy {
        text-align: center;
        right: 0;
        left: 50%;
        width: 300px;
        margin-left: -150px;
    }
}
</style>

<script>
    function flashy(message, link) {
        var template = $($("#flashy-template").html());
        $(".flashy").remove();
        template.find(".flashy__body").append(message).attr("href", link || "#").end()
         .appendTo("body").hide().fadeIn(300).delay(2800).animate({
            marginRight: "-100%"
        }, 300, "swing", function() {
            $(this).remove();
        });
    }
</script>

@if(Session::has('flashy_notification.message'))
<script id="flashy-template" type="text/template">
    @if(Session::get('flashy_notification.type')=='success')
    <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">
         <i class="material-icons">speaker_notes</i>
        <a href="#" class="flashy__body" target="_blank"></a>
    </div>
    @elseif(Session::get('flashy_notification.type')=='error')
     <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">

        <a href="#" class="flashy__body" target="_blank"><span class="material-icons" style="font-size:15px;">sms_failed</span>&nbsp</a>
    </div>
    @else
     <div class="flashy flashy--{{ Session::get('flashy_notification.type') }}">

        <a href="#" class="flashy__body" target="_blank"><span class="material-icons" style="font-size:20px;">insert_emoticon</span>&nbsp&nbsp</a>
    </div>

    @endif
</script>

<script>
    flashy("{{ Session::get('flashy_notification.message') }}", "{{ Session::get('flashy_notification.link') }}");
</script>
@endif