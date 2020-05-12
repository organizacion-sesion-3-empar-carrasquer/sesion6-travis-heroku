{ "collection" :
    {
        "title" : "Series TV Database",
            "type" : "Seriestv",
            "version" : "1.0",
            "href" : "{{ path_for('seriestv')}}",
      
            "links" : [
                {"rel" : "profile" , "href" : "http://schema.org/seriestv","prompt":"Perfil"},
                {"rel" : "collection", "href" : "{{ path_for('movies') }}","prompt":"Movies"},
                {"rel" : "collection", "href" : "{{ path_for('books') }}","prompt":"Books"},
                {"rel" : "collection", "href" : "{{ path_for('musicalbums') }}","prompt":"Music Albums"},
                {"rel" : "collection", "href" : "{{ path_for('games') }}","prompt":"Videogames"},
		{"rel" : "collection", "href" : "{{ path_for('seriestv') }}","prompt":"Series TV"}
            ],
      
            "items" : [
                {
                    "href" : "{{ path_for('seriestv') }}/{{ item.id }}",
                        "data" : [
                            {"name" : "name", "value" : "{{ item.name }}", "prompt" : "Nombre del Juego"},
                            {"name" : "description", "value" : "{{ item.description }}", "prompt" : "Descripción del Juego"},
                            {"name" : "channel", "value" : "{{ item.channel }}", "prompt" : "Canal"},                         
                            {"name" : "datePublished", "value" : "{{ item.datePublished }}", "prompt" : "Fecha de lanzamiento"}
                        ]
                        } 
	  
            ],
      
            "template" : {
            "data" : [
                {"name" : "name", "value" : "", "prompt" : "Nombre del Juego"},
                {"name" : "description", "value" : "", "prompt" : "Descripción del Juego"},
                {"name" : "channel", "value" : "", "prompt" : "Canal"},
                {"name" : "datePublished", "value" : "", "prompt" : "Fecha de lanzamiento"}                
            ]
                }
    } 
}




