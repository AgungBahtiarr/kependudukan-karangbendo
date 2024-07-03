(function (jQuery) {
    // "use strict";
    // data-mode="click" for using event
    // data-rtl="false" for property
    
    const storageRtl = localStorage.getItem('rtl')

    if (storageRtl !== 'null') {
        changeRtl(storageRtl);
    }

    if($('html').attr('dir') !== undefined && $('html').attr('dir') == 'rtl'){
        changeRtl('true');
    } else {
        changeRtl('false');
    }
        
    $(document).on("click",'[data-mode="rtl"]' ,function (e) {

        const rtl = $(this).attr('data-active');
        
        changeRtl(rtl)
    });
    // document.addEventListener('ChangeRtl', function (e) {
    //     console.log(e)
    //   })
    
    function changeRtl(rtl) {
        if (rtl === 'true') {   
            $('html').attr("dir", "rtl");
            $('[data-mode="rtl"]').attr('data-active','false').text('LTR')
            rtl = true;
        } else {
            $('html').attr("dir",'ltr');
            $('[data-mode="rtl"]').attr('data-active','true').text('RTL')
            rtl = false;
        }

        updateLocalStorage(rtl)
        const event = new CustomEvent("ChangeRtl", {detail: {rtl: rtl} });
        document.dispatchEvent(event);
    }
    
    function updateLocalStorage(rtl) {
        localStorage.setItem('rtl', rtl);
    }


})(jQuery);