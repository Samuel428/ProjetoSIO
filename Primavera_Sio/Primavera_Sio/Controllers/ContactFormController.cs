using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web;
using System.Web.Http;
using System.Web.Mvc;

namespace Primavera_Sio.Controllers
{
    public class ContactFormController : ApiController
    {
        // Post: Enviar form
        public HttpResponseMessage Post(Lib_Primavera.Model.ContactForm contact)
        {

            int erro = Lib_Primavera.PriIntegration.enviarForm(contact);

            if (erro == 1)
            {
                return Request.CreateResponse(System.Net.HttpStatusCode.OK, "sucesso");

            }
            else
            {
                return Request.CreateResponse(HttpStatusCode.OK, "asd");
            }


        }
    }
}