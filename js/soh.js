// originally from: http://codingtips.blogspot.com/2004/07/javascript-function-to-validate-us.html
// modified for missing things (length & eol pipes)
function ValidState(sstate)
{
    if ( sstate.length != 2 )
        return false;

    sstates = "wa|or|ca|ak|nv|id|ut|az|hi|mt|wy|" +
              "co|nm|nd|sd|ne|ks|ok|tx|mn|ia|mo|" +
              "ar|la|wi|il|ms|mi|in|ky|tn|al|fl|" +
              "ga|sc|nc|oh|wv|va|pa|ny|vt|me|nh|" +
              "ma|ri|ct|nj|de|md|dc|";

    if (sstates.indexOf(sstate.toLowerCase() + "|") > -1)
        return true;

    return false;
}

// from: http://javascript.internet.com/forms/regexp-validation.html
function isPhoneNumber(str)
{
    // valid formats:
    //      (000)000-0000
    //      (000) 000-0000
    //      000-000-0000
    //      000.000.0000
    //      000 000 0000
    //      0000000000
    var re = /^\(?[2-9]\d{2}[\)\.-]?\s?\d{3}[\s\.-]?\d{4}$/
    return re.test(str);
}

function validate_form( form )
{
    var vname=form.name.value;
    var vaddy=form.addy.value;
    var vcity=form.city.value;
    var vstate=form.astate.value;
    var vzip=form.zip.value;
    var vphone=form.phone.value;
    var vcall=form.call.value;
    var vcustom=form.acustom.value;

    if ( vname == "" )
    {
        alert( "Please input your name.  It is a required field." );
        return false;
    }

    if ( vaddy == "" )
    {
        alert( "Please input your address.  It is a required field." );
        return false;
    }

    if ( vcity == "" )
    {
        alert( "Please input your city.  It is a required field." );
        return false;
    }

    if ( vstate == "" )
    {
        alert( "Please input your state.  It is a required field." );
        return false;
    }

    if ( ValidState(vstate) != true )
    {
        alert( "Your state is not a valid US Postal Abbreviation." );
        return false;
    }
    
    if ( vzip == "" )
    {
        alert( "Please input your zip code.  It is a required field." );
        return false;
    }

    if ( ( vphone != "" ) && ( isPhoneNumber(vphone) != true ) )
    {
        alert( "You've entered your phone number in an invalid format." );
        return false;
    }

    if ( vcustom == "Input your own comments here which will be added to ours in the auto-generated PDF.  If you have no additional comments, leave this field alone, or submit blank." )
    {
        form.acustom.value=""
    }

    return true;
}
