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
    public class RegistarController : ApiController
    {
        // Post: Registar
        public HttpResponseMessage Post(Lib_Primavera.Model.Cliente cliente)
        {

            int erro = Lib_Primavera.PriIntegration.RegistarUser(cliente);

            if (erro == 1)
            {
                return Request.CreateResponse(System.Net.HttpStatusCode.OK, "true");

            }
            else if (erro == -1)
            {
                return Request.CreateResponse(System.Net.HttpStatusCode.OK, "jaexiste");
            }
            else
            {
                return Request.CreateResponse(HttpStatusCode.OK, "asd");
            }


        }
    }
}