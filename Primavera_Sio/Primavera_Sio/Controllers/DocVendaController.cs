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
    public class DocVendaController : ApiController
    {
        //POST encomenda
        public HttpResponseMessage Post(Lib_Primavera.Model.DocVenda dv)
        {

            string erro = Lib_Primavera.PriIntegration.Encomendas_New(dv);
            if (erro == "Sucesso")
            {
                return Request.CreateResponse(System.Net.HttpStatusCode.OK, "true");

            }
            else if (erro == "erro")
            {
                return Request.CreateResponse(System.Net.HttpStatusCode.OK, "false");
            }
            else
            {
                return Request.CreateResponse(HttpStatusCode.OK, erro);
            }
        }

    }
}