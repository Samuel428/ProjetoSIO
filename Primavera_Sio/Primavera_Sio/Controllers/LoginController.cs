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
    public class LoginController : ApiController
    {
        // GET: Login
        public HttpResponseMessage Post(Lib_Primavera.Model.Login cliente)
        {
            int erro = Lib_Primavera.PriIntegration.ValidarUser(cliente);

            if (erro == 1)
            {
                return Request.CreateResponse(HttpStatusCode.OK, "true");

            }
            else if (erro == 0)
            {
                return Request.CreateResponse(HttpStatusCode.OK, "false");
            }
            return null;

        }
    }
}