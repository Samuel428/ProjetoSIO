using Primavera_Sio.Lib_Primavera.Model;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Http;
using System.Web.Mvc;

namespace Primavera_Sio.Controllers
{
    public class ArtigoController : ApiController
    {
        // GET: Artigo

        public IEnumerable<Lib_Primavera.Model.Artigo> Get()
        {
            return Lib_Primavera.PriIntegration.ListaArtigosBikeMontanha();
        }
        // GET: Artigo/id

        public IEnumerable<Lib_Primavera.Model.Artigo> GetSingleSpeed(int idTipoArtigo)
        {
            return Lib_Primavera.PriIntegration.ListaArtigosBikeSingleSpeed(idTipoArtigo);
        }
        public Artigo GetBike(string idArtigo)
        {
            return Lib_Primavera.PriIntegration.GetBike(idArtigo);
        }
        public IEnumerable<Lib_Primavera.Model.Artigo> GetBikes(string tipo)
        {
            return Lib_Primavera.PriIntegration.ListaBikes(tipo);
        }
        public IEnumerable<Lib_Primavera.Model.Artigo> GetAcessórios(string acessorio)
        {
            return Lib_Primavera.PriIntegration.GetAcessórios(acessorio);
        }
    }
}