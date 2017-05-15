using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using Interop.ErpBS800;
using Interop.StdPlatBS800;
using Interop.StdBE800;
using Interop.GcpBE800;
using ADODB;
using Interop.IGcpBS800;
using Primavera_Sio.Lib_Primavera;
//using Interop.StdBESql800;
//using Interop.StdBSSql800;

namespace Primavera_Sio.Lib_Primavera
{
    public class PriIntegration
    {


        #region Cliente

        public static List<Primavera_Sio.Lib_Primavera.Model.Cliente> ListaClientes()
        {


            StdBELista objList;

            List<Primavera_Sio.Lib_Primavera.Model.Cliente> listClientes = new List<Primavera_Sio.Lib_Primavera.Model.Cliente>();

            if (PriEngine.InitializeCompany("A01", "Samuel", "123") == true)
            {

                //objList = PriEngine.Engine.Comercial.Clientes.LstClientes();

                objList = PriEngine.Engine.Consulta("SELECT Cliente, Nome, Moeda, NumContrib as NumContribuinte, Fac_Mor AS campo_exemplo FROM  CLIENTES");


                while (!objList.NoFim())
                {
                    listClientes.Add(new Primavera_Sio.Lib_Primavera.Model.Cliente
                    {
                        CodCliente = objList.Valor("Cliente"),
                        NomeCliente = objList.Valor("Nome"),
                        Moeda = objList.Valor("Moeda"),
                        NumContribuinte = objList.Valor("NumContribuinte"),
                        Morada = objList.Valor("campo_exemplo")
                    });
                    objList.Seguinte();

                }

                return listClientes;
            }
            else
                return null;
        }

        public static int RegistarUser(Lib_Primavera.Model.Cliente cliente)
        {
            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            StdBELista objList = null;


            if (PriEngine.InitializeCompany("A01", "Samuel", "123") == true)
            {
                //verificar se utilizador ja existe
                objList = PriEngine.Engine.Consulta("Select cliente From Clientes Where cliente ='" + cliente.NomeCliente + "'");

                if (objList.NumLinhas() == 1)
                {
                    //user ja existe
                    return -1;
                }

                else
                {
                    //ok, podes registar user
                    GcpBECliente myCli = new GcpBECliente();
                    myCli.set_Cliente(cliente.NomeCliente);
                    myCli.set_Nome(cliente.NomeCliente);
                    myCli.set_NumContribuinte(cliente.NumContribuinte);
                    myCli.set_Moeda(cliente.Moeda);
                    myCli.set_Observacoes(cliente.Password);

                    PriEngine.Engine.Comercial.Clientes.Actualiza(myCli);

                    return 1;
                }
            }
            else
            {
                return 0;
            }
        }

        public static int ValidarUser(Lib_Primavera.Model.Login cliente)
        {
            Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
            StdBELista objList = null;


            if (PriEngine.InitializeCompany("A01", "Samuel", "123") == true)
            {
                objList = PriEngine.Engine.Consulta("Select * From (Select cliente, convert(nvarchar(max),notas) asnotas From clientes)a where a.asnotas='" + cliente.Password + "' and a.cliente='" + cliente.UserName + "'");

                if (objList.NumLinhas() == 1)
                {

                    return 1;
                }

                else
                {

                    return 0;
                }
            }
            else
            {
                return 0;
            }
        }

        //public static Primavera_Sio.Lib_Primavera.Model.Cliente GetCliente(string codCliente)
        //{


        //    GcpBECliente objCli = new GcpBECliente();


        //    Primavera_Sio.Lib_Primavera.Model.Cliente myCli = new Primavera_Sio.Lib_Primavera.Model.Cliente();

        //    if (PriEngine.InitializeCompany(Primavera_Sio.Properties.Settings.Default.Company.Trim(), Primavera_Sio.Properties.Settings.Default.User.Trim(), Primavera_Sio.Properties.Settings.Default.Password.Trim()) == true)
        //    {

        //        if (PriEngine.Engine.Comercial.Clientes.Existe(codCliente) == true)
        //        {
        //            objCli = PriEngine.Engine.Comercial.Clientes.Edita(codCliente);
        //            myCli.CodCliente = objCli.get_Cliente();
        //            myCli.NomeCliente = objCli.get_Nome();
        //            myCli.Moeda = objCli.get_Moeda();
        //            myCli.NumContribuinte = objCli.get_NumContribuinte();
        //            myCli.Morada = objCli.get_Morada();
        //            return myCli;
        //        }
        //        else
        //        {
        //            return null;
        //        }
        //    }
        //    else
        //        return null;
        //}

        //public static Lib_Primavera.Model.RespostaErro UpdCliente(Lib_Primavera.Model.Cliente cliente)
        //{
        //    Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();


        //    GcpBECliente objCli = new GcpBECliente();

        //    try
        //    {

        //        if (PriEngine.InitializeCompany(Primavera_Sio.Properties.Settings.Default.Company.Trim(), Primavera_Sio.Properties.Settings.Default.User.Trim(), Primavera_Sio.Properties.Settings.Default.Password.Trim()) == true)
        //        {

        //            if (PriEngine.Engine.Comercial.Clientes.Existe(cliente.CodCliente) == false)
        //            {
        //                erro.Erro = 1;
        //                erro.Descricao = "O cliente não existe";
        //                return erro;
        //            }
        //            else
        //            {

        //                objCli = PriEngine.Engine.Comercial.Clientes.Edita(cliente.CodCliente);
        //                objCli.set_EmModoEdicao(true);

        //                objCli.set_Nome(cliente.NomeCliente);
        //                objCli.set_NumContribuinte(cliente.NumContribuinte);
        //                objCli.set_Moeda(cliente.Moeda);
        //                objCli.set_Morada(cliente.Morada);

        //                PriEngine.Engine.Comercial.Clientes.Actualiza(objCli);

        //                erro.Erro = 0;
        //                erro.Descricao = "Sucesso";
        //                return erro;
        //            }
        //        }
        //        else
        //        {
        //            erro.Erro = 1;
        //            erro.Descricao = "Erro ao abrir a empresa";
        //            return erro;

        //        }

        //    }

        //    catch (Exception ex)
        //    {
        //        erro.Erro = 1;
        //        erro.Descricao = ex.Message;
        //        return erro;
        //    }

        //}


        //public static Lib_Primavera.Model.RespostaErro DelCliente(string codCliente)
        //{

        //    Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();
        //    GcpBECliente objCli = new GcpBECliente();


        //    try
        //    {

        //        if (PriEngine.InitializeCompany(Primavera_Sio.Properties.Settings.Default.Company.Trim(), Primavera_Sio.Properties.Settings.Default.User.Trim(), Primavera_Sio.Properties.Settings.Default.Password.Trim()) == true)
        //        {
        //            if (PriEngine.Engine.Comercial.Clientes.Existe(codCliente) == false)
        //            {
        //                erro.Erro = 1;
        //                erro.Descricao = "O cliente não existe";
        //                return erro;
        //            }
        //            else
        //            {

        //                PriEngine.Engine.Comercial.Clientes.Remove(codCliente);
        //                erro.Erro = 0;
        //                erro.Descricao = "Sucesso";
        //                return erro;
        //            }
        //        }

        //        else
        //        {
        //            erro.Erro = 1;
        //            erro.Descricao = "Erro ao abrir a empresa";
        //            return erro;
        //        }
        //    }

        //    catch (Exception ex)
        //    {
        //        erro.Erro = 1;
        //        erro.Descricao = ex.Message;
        //        return erro;
        //    }

        //}



        //public static Lib_Primavera.Model.RespostaErro InsereClienteObj(Model.Cliente cli)
        //{

        //    Lib_Primavera.Model.RespostaErro erro = new Model.RespostaErro();


        //    GcpBECliente myCli = new GcpBECliente();

        //    try
        //    {
        //        if (PriEngine.InitializeCompany(Primavera_Sio.Properties.Settings.Default.Company.Trim(), Primavera_Sio.Properties.Settings.Default.User.Trim(), Primavera_Sio.Properties.Settings.Default.Password.Trim()) == true)
        //        {

        //            myCli.set_Cliente(cli.CodCliente);
        //            myCli.set_Nome(cli.NomeCliente);
        //            myCli.set_NumContribuinte(cli.NumContribuinte);
        //            myCli.set_Moeda(cli.Moeda);
        //            myCli.set_Morada(cli.Morada);

        //            PriEngine.Engine.Comercial.Clientes.Actualiza(myCli);

        //            erro.Erro = 0;
        //            erro.Descricao = "Sucesso";
        //            return erro;
        //        }
        //        else
        //        {
        //            erro.Erro = 1;
        //            erro.Descricao = "Erro ao abrir empresa";
        //            return erro;
        //        }
        //    }

        //    catch (Exception ex)
        //    {
        //        erro.Erro = 1;
        //        erro.Descricao = ex.Message;
        //        return erro;
        //    }


        //}



        #endregion Cliente;   // -----------------------------  END   CLIENTE    -----------------------

        public static List<Model.Artigo> ListaArtigos()
        {
            ErpBS objMotor = new ErpBS();
            //MotorPrimavera mp = new MotorPrimavera();
            StdBELista objList;

            Model.Artigo art = new Model.Artigo();
            List<Model.Artigo> listArts = new List<Model.Artigo>();

            if (PriEngine.InitializeCompany("A01", "Samuel", "123") == true)
            {

                //objList = PriEngine.Engine.Comercial.Artigos.LstArtigos();
                objList = PriEngine.Engine.Consulta("SELECT * FROM  Artigo");

                while (!objList.NoFim())
                {
                    art = new Model.Artigo();
                    if (objList.Valor("stkactual") > 0)
                    {
                        art.CodArtigo = objList.Valor("artigo");
                        art.DescArtigo = objList.Valor("descricao");
                        art.categoria = objList.Valor("unidadebase");
                        art.Quantidade = objList.Valor("stkactual");
                        art.marca = objList.Valor("DataUltimaActualizacao");
                        art.Preco = objList.Valor("IVA");

                        listArts.Add(art);

                    }
                    objList.Seguinte();
                }

                return listArts;

            }
            else
            {
                return null;

            }

        }
    }

}