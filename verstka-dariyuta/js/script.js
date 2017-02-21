$(document).ready(function(){
    if ( $('.timer').length > 0 ) {
        setInterval(function(){
            $('.timer').each(function(){
                sec = $(this).attr('data-sec');
                if (sec < 1) return false;
                sec = sec - 1;
                $(this).attr('data-sec', sec);

                day = sec / 86400 >> 0;
                hours = (sec / 3600 >> 0)  % 24;
                minutes = (sec / 60 >> 0) % 60;
                seconds = sec % 60;
                $(this).find('.timer-day-tens').text( day / 10 >> 0 );
                $(this).find('.timer-day-unit').text( day % 10 );
                $(this).find('.timer-hour-tens').text( hours / 10 >> 0 );
                $(this).find('.timer-hour-unit').text( hours % 10 );
                $(this).find('.timer-min-tens').text( minutes / 10 >> 0 );
                $(this).find('.timer-min-unit').text( minutes % 10 );
                $(this).find('.timer-sec-tens').text( seconds / 10 >> 0 );
                $(this).find('.timer-sec-unit').text( seconds % 10 >> 0 );
            });
        }, 1000)
    }
})