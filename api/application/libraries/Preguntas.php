<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Preguntas {

  public function ambiental(){

    return json_decode('{
      "1": {
        "pregunta": "¿Qué es un aspecto ambiental?",
        "respuestas": [{
          "id": 1,
          "str": "Son todos aquellos factores del sitio que pueden interactuar con el ambiente (químicos, residuos, emisiones)."
        },
        {
          "id": 2,
          "str": "Son los elementos como aire, agua, suelo, vegetación."
        },
        {
          "id": 3,
          "str": "Es el ecosistema que nos rodea."
        }
      ]
    },
    "2": {
      "pregunta": "¿Qué es un impacto ambiental?",
      "respuestas": [{
        "id": 1,
        "str": "Son aquellos cambios que sufre el ambiente por nuestras actividades."
      },
      {
        "id": 2,
        "str": "Son los fenómenos como huracanes y tornados."
      },
      {
        "id": 3,
        "str": "Son los cambios que tiene la naturaleza por su evolución."
      }
    ]
  },
  "3": {
    "pregunta": "¿En donde se tratan nuestras aguas residuales?",
    "respuestas": [{
      "id": 1,
      "str": "Planta de Tratamiento de agua residual Municipal."
    },
    {
      "id": 2,
      "str": "En Danone Planta San Luis."
    },
    {
      "id": 3,
      "str": "No se tratan."
    }
  ]
},
"4": {
  "pregunta": "¿Cómo podemos evitar la contaminación del agua?",
  "respuestas": [{
    "id": 1,
    "str": "No verter aceites o grasas al agua, no tirar alimentos o residuos orgánicos, no verter algún otro químico."
  },
  {
    "id": 2,
    "str": "Evitando usarla en nuestras actividades diarias."
  },
  {
    "id": 3,
    "str": "Arrojando nuestros desechos a los ríos y lagos."
  }
]
},
"5": {
  "pregunta": "¿Qué es un residuo?",
  "respuestas": [{
    "id": 1,
    "str": "Materiales generados en nuestras actividades y que no tienen un valor para nosotros; pero puede ser utilizado para otra actividad o proceso."
  },
  {
    "id": 2,
    "str": "La basura en general."
  },
  {
    "id": 3,
    "str": "Lo que desechamos en nuestros hogares."
  }
]
},
"6": {
  "pregunta": "¿Cuáles son características de residuos peligrosos?",
  "respuestas": [{
    "id": 1,
    "str": "Corrosivo y Reactivo."
  },
  {
    "id": 2,
    "str": "Explosivo y soluble."
  },
  {
    "id": 3,
    "str": "Tóxico y aceites."
  }
]
},
"7": {
  "pregunta": "¿Cuáles son dos residuos peligrosos generados en Planta San Luis?",
  "respuestas": [{
    "id": 1,
    "str": "Residuos químicos y aceites gastados."
  },
  {
    "id": 2,
    "str": "Residuos químicos y producto no conforme."
  },
  {
    "id": 3,
    "str": "Lámparas fluorescentes y residuos metálicos."
  }
]
},
"8": {
  "pregunta": "¿En qué consiste el indicador térmico?",
  "respuestas": [{
    "id": 1,
    "str": "Consumo de gas natural y volumen de producción."
  },
  {
    "id": 2,
    "str": "Vapor de agua y volumen de producción."
  },
  {
    "id": 3,
    "str": "Volumen de producción por vapor de agua."
  }
]
},
"9": {
  "pregunta": "¿Cuál sería una estrategia para reducir el consumo de energía eléctrica?",
  "respuestas": [{
    "id": 1,
    "str": "Apagar las luces cuando no se utilicen."
  },
  {
    "id": 2,
    "str": "Arrancando todas las máquinas al mismo tiempo."
  },
  {
    "id": 3,
    "str": "Dejar las luces encendidas para no prender y apagar."
  }
]
},
"10": {
  "pregunta": "Menciona un impacto ambiental de Planta San Luis:",
  "respuestas": [{
    "id": 1,
    "str": "Contaminación del aire por emisiones."
  },
  {
    "id": 2,
    "str": "Contaminación de océanos."
  },
  {
    "id": 3,
    "str": "Desplazamiento de fauna."
  }
]
}

}', true);

}

public function alimentaria(){
  return json_decode('{
		"1": {
			"pregunta": "¿Cómo se llama el sistema de certificación para la seguridad alimentaria implementado en danone planta San Luis?",
			"respuestas": [{
				"id": 1,
				"str": "FSSC 22000"
			},
			{
				"id": 2,
				"str": "ISO 18000."
			},
			{
				"id": 3,
				"str": "SQF."
			}
		]
	},
	"2": {
		"pregunta": "¿Cómo damos cumplimiento a nuestra política integral de Danone?",
		"respuestas": [{
			"id": 1,
			"str": "Cumpliendo con los objetivos del sistema de seguridad alimentaria y la generación de planes de trabajo para alcanzarlos."
		},
		{
			"id": 2,
			"str": "Asistimos a trabajar todos los días."
		},
		{
			"id": 3,
			"str": "Comprando nuestros productos."
		}
	]
},
"3": {
	"pregunta": "¿Cuáles son los objetivos del sistema de seguridad alimentaria?",
	"respuestas": [{
		"id": 1,
		"str": "0 quejas de consumidor por cuerpos extraños y 700 puntos en auto inspecciones mensuales."
	},
	{
		"id": 2,
		"str": "0 quejas de consumidor por defectos de calidad y 0 accidentes."
	},
	{
		"id": 3,
		"str": "Cumplimiento al 90% de auditorías de cliente y 0 impactos ambientales."
	}
]
},
"4": {
	"pregunta": "¿En cuántas zonas está dividida la planta Danone San Luis?",
	"respuestas": [{
		"id": 1,
		"str": "3, Roja, amarilla y verde."
	},
	{
		"id": 2,
		"str": "5, Roja, naranja, azul, verde y rosa."
	},
	{
		"id": 3,
		"str": "1, gris"
	}
]
},
"5": {
	"pregunta": "¿Está permitido salir con el uniforme puesto de la planta (incluyendo zapatos de seguridad y chamarra de la dotación)?",
	"respuestas": [{
		"id": 1,
		"str": "Si"
	},
	{
		"id": 2,
		"str": "No"
	}
]
},
"6": {
	"pregunta": "¿Está permitido el uso de barba dentro de las zonas rojas?",
	"respuestas": [{
		"id": 1,
		"str": "Si"
	},
	{
		"id": 2,
		"str": "No"
	}
]
},
"7": {
	"pregunta": "¿Está permitido usar uñas postizas, perfume, masticar chicle?",
	"respuestas": [{
		"id": 1,
		"str": "Si"
	},
	{
		"id": 2,
		"str": "No"
	}
]
},
"8": {
	"pregunta": "¿Esta permitido ingresar alimentos en áreas productivas?",
	"respuestas": [{
		"id": 1,
		"str": "Si"
	},
	{
		"id": 2,
		"str": "No"
	}
]
},
"9": {
	"pregunta": "¿Cuál es el objetivo del Control de material extraño?",
	"respuestas": [{
		"id": 1,
		"str": "Minimizar la posibilidad de contaminación por cuerpos extraños, asegurando la inocuidad del producto."
	},
	{
		"id": 2,
		"str": "Evitar riesgos de contaminación por detergentes químicos."
	},
	{
		"id": 3,
		"str": "Evitar riesgos de contaminación por detergentes químicos."
	}
]
},
"10": {
	"pregunta": "¿Qué debo hacer en caso de ruptura de vidrio?",
	"respuestas": [{
		"id": 1,
		"str": "Acordonar el área, notificar a calidad o seguridad alimentaria, retirar pedazos, rechazar producto o MP en caso de contaminación."
	},
	{
		"id": 2,
		"str": "Avisar al líder, recoger restos de vidrio y tirarlos a la basura."
	},
	{
		"id": 3,
		"str": "Limpiar el área, avisarle a mi compañero para que me ayude a limpiar."
	}
]
},
"11": {
	"pregunta": "¿Cuáles son los tres tipos de barreras del programa MIP (Manejo integral de Plagas)",
	"respuestas": [{
		"id": 1,
		"str": "Físicas, Químicas y Biológicas"
	},
	{
		"id": 2,
		"str": "Físicas Químicas y Culturales."
	},
	{
		"id": 3,
		"str": "Mallas, Filtros y Trampas magnéticas"
	}
]
},
"12": {
	"pregunta": "¿Qué debo hacer para que el programa MIP Funcione?",
	"respuestas": [{
		"id": 1,
		"str": "Introducir alimentos al área, abrir las puertas y mantener desordenada mi área de trabajo."
	},
	{
		"id": 2,
		"str": "Proporcionar a las plagas alimento, refugio y agua."
	},
	{
		"id": 3,
		"str": "Mantener mi área de trabajo limpia y ordenada, no dejar puertas abiertas, no almacenar alimentos en el locker, no dañar dispositivos y reportar cualquier incidencia de plaga."
	}
]
},
"13": {
	"pregunta": "¿Cuáles son los lineamientos para un buen llenado de registros?",
	"respuestas": [{
		"id": 1,
		"str": "Borrones y enmendaduras, cancelación de espacios."
	},
	{
		"id": 2,
		"str": "Letra legible, usar tinta azul o negra, llenar todos los campos, Si hay espacios vacíos colocar un tache, no usar corrector, firmarse máximo en 48Hrs."
	},
	{
		"id": 3,
		"str": "Número de control, vigencia y fecha de caducidad."
	}
]
},
"14": {
	"pregunta": "¿Cuáles son los beneficios de contar con un sistema de control documental?",
	"respuestas": [{
		"id": 1,
		"str": "Eliminar el uso de papel, llevar un control."
	},
	{
		"id": 2,
		"str": "Mantener el sistema."
	},
	{
		"id": 3,
		"str": "Mantener actualizados y organizados los documentos, facilita la revisión y aprobación de archivos."
	}
]
},
"15": {
	"pregunta": "¿Por qué es importante contar con Trazabilidad?",
	"respuestas": [{
		"id": 1,
		"str": "Porque identificamos productos terminados con sospecha de no ser inocuos."
	},
	{
		"id": 2,
		"str": "Porque es requisito de la norma."
	},
	{
		"id": 3,
		"str": "Porque es necesario en la empresa."
	}
]
},
"16": {
	"pregunta": "¿Qué riesgos podemos identificar con la trazabilidad?",
	"respuestas": [{
		"id": 1,
		"str": "Riesgos a la salud por ETA´S, Riesgos por residuos químicos, Errores productivos y malas prácticas."
	},
	{
		"id": 2,
		"str": "Riesgos al ambiente."
	},
	{
		"id": 3,
		"str": "Riesgos Físicos, Químicos y Biológicos."
	}
]
},
"17": {
	"pregunta": "¿Qué debo hacer para que la trazabilidad sea correcta?",
	"respuestas": [{
		"id": 1,
		"str": "Llenar correctamente los registros, Utilizar formatos actualizados, Conservar lote de identificación, evitar perdida de registros."
	},
	{
		"id": 2,
		"str": "No cancelar espacios, llenar los registros como quiero y los resguardo en mi locker."
	},
	{
		"id": 3,
		"str": "Cuido mi lugar de trabajo y lo mantengo limpio."
	}
]
},
"18": {
	"pregunta": "¿Qué son los fluidos corporales?",
	"respuestas": [{
		"id": 1,
		"str": "Fluido derramado al sufrir una herida."
	},
	{
		"id": 2,
		"str": "Fluidos que se producen en el interior del cuerpo humano (Lagrimas, Sangre, sudor, Vomito, etc.)."
	},
	{
		"id": 3,
		"str": "Derrame de producto al consumirlo en el Almacen o directo de la línea."
	}
]
},
"19": {
	"pregunta": "¿Qué debo hacer en caso de derrame de fluidos corporales?",
	"respuestas": [{
		"id": 1,
		"str": "Dar aviso al líder, acordonar el área, utilizar kit de fluidos corporales si hay contaminación del producto Rechazar."
	},
	{
		"id": 2,
		"str": "Limpiar con utensilios color rojo."
	},
	{
		"id": 3,
		"str": "Avisar al líder y lavar con agua simple."
	}
]
},
"20": {
	"pregunta": "¿Que utensilio de limpieza se utiliza para derrame de fluidos corporales?",
	"respuestas": [{
		"id": 1,
		"str": "Azul."
	},
	{
		"id": 2,
		"str": "Violeta."
	},
	{
		"id": 3,
		"str": "Blanco con marca café."
	}
]
},
"21": {
	"pregunta": "¿Qué pasa si no se aplica el plan de limpieza en Planta?",
	"respuestas": [{
		"id": 1,
		"str": "Mantengo mi área de trabajo limpia."
	},
	{
		"id": 2,
		"str": "Proliferación de microorganismos, insatisfacción de los clientes, daño de la marca Danone."
	},
	{
		"id": 3,
		"str": "No pasa nada."
	}
]
},
"22": {
	"pregunta": "¿Qué debo hacer para asegurar y mantener un ambiente higiénico en la planta?",
	"respuestas": [{
		"id": 1,
		"str": "Contar con un programa de limpieza para evitar condiciones inseguras."
	},
	{
		"id": 2,
		"str": "Contar con un programa de limpieza, respetar utensilios de colores, utilizar detergentes autorizados."
	},
	{
		"id": 3,
		"str": "Lavarme las manos antes de ingresar al área con detergentes autorizados."
	}
]
},
"23": {
	"pregunta": "¿Para qué se deben inspeccionar los transportes de carga y materia prima?",
	"respuestas": [{
		"id": 1,
		"str": "Para evitar riesgos de contaminación al producto y materias primas."
	},
	{
		"id": 2,
		"str": "Para evitar derrames dentro de la unidad de transporte."
	},
	{
		"id": 3,
		"str": "Para cumplir con los requerimientos del grupo danone."
	}
]
},
"24": {
	"pregunta": "¿Cuáles son los lineamientos en la recepción de materias primas?",
	"respuestas": [{
		"id": 1,
		"str": "Presentarse en ventanilla, dejar las llaves del transporte y colocarse en rampa para descarga."
	},
	{
		"id": 2,
		"str": "Incentivar al jefe del Almacen para que me descargue rápido."
	},
	{
		"id": 3,
		"str": "Vehículos en buenas condiciones, certificado de Fumigación vigente y documentación completa."
	}
]
}
}', true);
}


public function seguridad(){

}


public function mtoAutonomo(){

}

public function sistemasBasicos(){

}



}
