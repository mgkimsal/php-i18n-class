This is a basic i18n class demonstrating how one might approach 
this problem in PHP.  It's been done before, but often I see 
this approached with message strings in a database, and I prefer 
text files, as they can be manipulated, versioned and transferred 
more easily.

The samples are taken from the Grails project, but I didn't bring 
them all over - just a couple to give you an idea of how to get 
started.

// Examples

$es = new il8n("es");
echo $es->getPhrase("invalid.creditCard","123456");
//  123456 no es un número de tarjeta de credit válida

$en = new il8n("en");
echo $en->getPhrase("invalid.creditCard","123456");
// Value 123456 is not a valid credit card number.

echo $es->getPhrase("invalid.range", 44, 55, 66);
// 44 no entra en el rango válido de 55 y 66.

echo $en->getPhrase("invalid.range", 44, 55, 66);
// Value 44 does not fall within the valid range from 55 to 66.
