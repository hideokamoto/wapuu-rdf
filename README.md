# Wapuu RDF Converter
Create Wapuu RDF(JSON-LD) scripts using Wapuus JSON API.

#How to use
```
$ git clone git@github.com:hideokamoto/wapuu-rdf.git
$ cd wapuu-rdf
$ php converter.php
```

#Schemes
- @context:http://schema.org/
- @type:ImageObject
- @id: The unique ID of your Wapuu.
- schema:name: The name of your Wapuu.
- schema:url: The GitHub repository of your Wapuu.
- schema:image: The URL to your Wapuu's image file. Image file should be JPEG or GIF or PNG.
- schema:fileFormat: image/gif or image/jpeg or image/png
- schema:creator: Your name.
