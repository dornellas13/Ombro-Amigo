PUT api_ombro_amigo
{
	"mappings": {
		"doacoes": {
		  "properties": { 
		    "descricao":    { "type": "text"  }, 
		    "quantidade":    { "type": "integer" }, 
		    "flg_ativo":    { "type": "boolean"  },
		    "categoria":{
		      "properties": {
		        "id": {"type" : "keyword"},
				    "nome" : {"type" : "text"} 
		      }
		    },
		    "pessoa": {
		       "properties": { 
		         	"id" : {"type" : "keyword"},
				      "nome" : {"type" : "text"}
		       }
		    },
		    "created":  {
		      "type":   "date",
		      "format": "dd/MM/yyyy"
		    }
		  }
		},
		"solicitacoes": { 
			"properties": { 
		    "descricao":    { "type": "text"  }, 
		    "quantidade":    { "type": "integer" }, 
		    "flg_ativo":    { "type": "boolean"  },
		   "categoria":{
		      "properties": {
		        "id": {"type" : "keyword"},
				    "nome" : {"type" : "text"} 
		      }
		    },
		    "pessoa": {
		       "properties": { 
		         	"id" : {"type" : "keyword"},
				      "nome" : {"type" : "text"}
		       }
		    },
		    "created":  {
		      "type":   "date", 
		      "format": "dd/MM/yyyy"
		    }
		  }
		}
	}
}