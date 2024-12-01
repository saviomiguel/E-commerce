

function consultarEndereco() {
    var cpea = $('#cpea').val();
//    var identificador = $('#identificador').val();

    $.ajax({
    //    url: 'http://127.0.0.1:9000/consultar-endereco?cpea=' + cpea + '&identificador=' + identificador,                Quando for passado o cpea e o identificador respectivamente
    url: 'http://127.0.0.1:9000/consultar-endereco?cpea=' + cpea,
        type: 'GET',
        success: function(response) {
            console.log(response)
            if (response.length > 0) {
                var endereco = response[0];


        function getProvincia(endereco) {
            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.zona &&
                endereco.detalhes.destino.rua.zona.bairro && endereco.detalhes.destino.rua.zona.bairro.municipio &&
                endereco.detalhes.destino.rua.zona.bairro.municipio.provincia) {
                return endereco.detalhes.destino.rua.zona.bairro.municipio.provincia.nomeProvincia;
            }

            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.centralidade &&
                endereco.detalhes.destino.rua.centralidade.bairro && endereco.detalhes.destino.rua.centralidade.bairro.municipio &&
                endereco.detalhes.destino.rua.centralidade.bairro.municipio.provincia) {
                return endereco.detalhes.destino.rua.centralidade.bairro.municipio.provincia.nomeProvincia;
            }

            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.bairro &&
                endereco.detalhes.destino.rua.bairro.municipio && endereco.detalhes.destino.rua.bairro.municipio.provincia) {
                return endereco.detalhes.destino.rua.bairro.municipio.provincia.nomeProvincia;
            }

            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio &&
                endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.bairro &&
                endereco.detalhes.destino.subrua.condominio.rua.bairro.municipio && endereco.detalhes.destino.subrua.condominio.rua.bairro.municipio.provincia) {
                return endereco.detalhes.destino.subrua.condominio.rua.bairro.municipio.provincia.nomeProvincia;
            }

            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio &&
                endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.centralidade &&
                endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro && endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.municipio &&
                endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.municipio.provincia) {
                return endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.municipio.provincia.nomeProvincia;
            }

            return "";
        }

        function getNomeMunicipio(endereco) {
            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.zona &&
                endereco.detalhes.destino.rua.zona.bairro && endereco.detalhes.destino.rua.zona.bairro.municipio) {
                return endereco.detalhes.destino.rua.zona.bairro.municipio.NomeMunicipio;
            }

            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.centralidade &&
                endereco.detalhes.destino.rua.centralidade.bairro && endereco.detalhes.destino.rua.centralidade.bairro.municipio) {
                return endereco.detalhes.destino.rua.centralidade.bairro.municipio.NomeMunicipio;
            }

            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.bairro &&
                endereco.detalhes.destino.rua.bairro.municipio) {
                return endereco.detalhes.destino.rua.bairro.municipio.NomeMunicipio;
            }

            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio &&
                endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.bairro &&
                endereco.detalhes.destino.subrua.condominio.rua.bairro.municipio) {
                return endereco.detalhes.destino.subrua.condominio.rua.bairro.municipio.NomeMunicipio;
            }

            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio &&
                endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.centralidade &&
                endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro && endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.municipio) {
                return endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.municipio.NomeMunicipio;
            }

            return "";
        }

        function getNomeBloco(endereco) {
            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.bloco) {
                return endereco.detalhes.destino.subrua.bloco.NomeBloco;
            }

            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.bloco) {
                return endereco.detalhes.destino.rua.bloco.NomeBloco;
            }

            return "";
        }

        function getNomeCentralidade(endereco) {
            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.centralidade) {
                return endereco.detalhes.destino.rua.centralidade.NomeCentralidade;
            }

            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio && endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.centralidade) {
                return endereco.detalhes.destino.subrua.condominio.rua.centralidade.NomeCentralidade;
            }

            return "";
        }

        function getNomeZona(endereco) {
            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.zona) {
                return endereco.detalhes.destino.rua.zona.NomeZona;
            }

            return "";
        }
        function getNomeBairro(endereco) {
            if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.zona && endereco.detalhes.destino.rua.zona.bairro) {
                return endereco.detalhes.destino.rua.zona.bairro.NomeBairro;
            } else if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.centralidade && endereco.detalhes.destino.rua.centralidade.bairro) {
                return endereco.detalhes.destino.rua.centralidade.bairro.NomeBairro;
            } else if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.bairro) {
                return endereco.detalhes.destino.rua.bairro.NomeBairro;
            } else if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio && endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.bairro) {
                return endereco.detalhes.destino.subrua.condominio.rua.bairro.NomeBairro;
            } else if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio && endereco.detalhes.destino.subrua.condominio.rua && endereco.detalhes.destino.subrua.condominio.rua.centralidade && endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro) {
                return endereco.detalhes.destino.subrua.condominio.rua.centralidade.bairro.NomeBairro;
            }

            return "";
        }

        function getNomeSubRua(endereco) {
            if (endereco.detalhes.destino.subrua) {
                return endereco.detalhes.destino.subrua.NomeSubRua;
            }

            return "";
        }
        function getNomeCondominio(endereco) {
            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio) {
                return endereco.detalhes.destino.subrua.condominio.NomeCondominio;
            }

            return "";
        }

        function getNomeCPEA(endereco) {
            if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.cpea) {
                return endereco.detalhes.destino.subrua.cpea.NomeCPEA;
            } else if (endereco.detalhes.destino.rua && endereco.detalhes.destino.rua.cpea) {
                return endereco.detalhes.destino.rua.cpea.NomeCPEA;
            }

            return "";
        }

        function getNomeRua(endereco) {
            if (endereco.detalhes.destino.rua) {
                return endereco.detalhes.destino.rua.NomeRua;
            } else if (endereco.detalhes.destino.subrua && endereco.detalhes.destino.subrua.condominio && endereco.detalhes.destino.subrua.condominio.rua) {
                return endereco.detalhes.destino.subrua.condominio.rua.NomeRua;
            }

            return "";
        }

        function getNumerodestino(endereco) {
            if (endereco.detalhes.destino && endereco.detalhes.destino.Numerodestino) {
                return endereco.detalhes.destino.Numerodestino;
            }

            return "";
        }

        function getNomedestino(endereco) {
            if (endereco.detalhes.destino && endereco.detalhes.destino.nome) {
                return endereco.detalhes.destino.nome;
            }

            return "";
        }

                $('#nomeProvincia').val(getProvincia(endereco));
                $('#nomeMunicipio').val(getNomeMunicipio(endereco));
                $('#nomeBloco').val(getNomeBloco(endereco));
                $('#nomeCentralidade').val(getNomeCentralidade(endereco));
                $('#nomeZona').val(getNomeZona(endereco));
                $('#nomeBairro').val(getNomeBairro(endereco));
                $('#nomeSubRua').val(getNomeSubRua(endereco));
                $('#nomeCondominio').val(getNomeCondominio(endereco));
                $('#nomeCPEA').val(getNomeCPEA(endereco));
                $('#nomeRua').val(getNomeRua(endereco));
                $('#numerodestino').val(getNumerodestino(endereco));
                $('#nome').val(getNomedestino(endereco));

                $('#pontoReferencia').val(endereco.PontoReferencia ?? "");
                $('#latitude').val(endereco.Latitude ?? "");
                $('#longitude').val(endereco.Longitude ?? "");
                $('#nomeTipoEndereco').val(endereco.detalhes.tipoEndereco.nomeTipoEndereco ?? "");
            } else {
                console.error("Nenhum dado de endereço encontrado na resposta.");
            }
        },
        error: function(xhr, status, error) {
            if (xhr.status === 404) {
                alert("Endereço não encontrado.");
            } else {
                console.error("Erro na requisição AJAX:", error);
                alert("Erro ao consultar endereço.");
            }
        }
    });
}


 // Função para consultar o endereço quando o campo de código postal perder o foco
    $('#cpea').on('blur', function() {
        consultarEndereco();
    });


