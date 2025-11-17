import { useParams } from 'react-router-dom'
import { useEffect, useState } from 'react'
import Select from 'react-select'

const BASE_URL = 'http://127.0.0.1:8000'

type PokemonInstance = {
  id: number
  box_id?: number
  team_id?: number
  pokemon_species_id: number
  custom_name: string
  format_id?: number
}

type PokemonSpecies = {
  id: number
  image: number
  name: string
  url: string
}
export default function Team() {
  const [pokemon, setPokemon] = useState<{ button: any }[]>([])
  const { teamId } = useParams()

  const [dropdownItems, setDropdownItems] = useState<{ value: number | null; label: string }[]>([
    {
      value: null,
      label: 'Select A Pokemon',
    },
  ])
  const [selectedItem, setSelectedItem] = useState<{ value: number | null; label: string }>({
    value: null,
    label: 'Select A Pokemon',
  })

  async function loadDropdownItems() {
    try {
      const json = await (await fetch(`${BASE_URL}/pokemon-species/index/?per-page=1000`)).json()
      const items = json.items.map((item: PokemonSpecies) => {
        return {
          value: item.id,
          label: item.name,
        }
      })
      setDropdownItems(items)
    } catch (err) {
      console.error(err)
    }
  }

  async function loadPokemon() {
    const json = await (await fetch(`${BASE_URL}/teams/pokemon-index?teamId=${teamId}`)).json()

    const species: { image: string; name: string }[] = json.species.map((item: PokemonSpecies) => {
      return {
        image: item.image,
        name: item.name,
      }
    })

    const instance: { id: number }[] = json.instances.map((item: PokemonInstance) => {
      return {
        id: item.id,
      }
    })

    const pokemon = instance.map((item, index) => {
      const id = item.id
      const imageUrl = species[index].image
      const name = species[index].name

      const imageTag = <img style={{ width: 200 }} alt={name} src={imageUrl}></img>
      return {
        button: <button key={id}> {imageTag} </button>,
      }
    })

    setPokemon(pokemon)
  }

  async function addPokemon() {
    if (!selectedItem.value) return
    await fetch(`${BASE_URL}/pokemon-instances/create`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      // todo: add functionality for all of these columns that are currently using test values:
      body: JSON.stringify({
        team_id: teamId,
        box_id: null, // todo: check if this is a box or team page
        pokemon_species_id: selectedItem.value,
        format_id: null,
        custom_name: 'unnamed',
        // created_at: '2007-09-24 00:00:00',
      }),
    })
    loadPokemon().then()
  }

  useEffect(() => {
    loadDropdownItems().then()
  }, [])

  useEffect(() => {
    loadPokemon().then()
  }, [])

  return (
    <div>
      <div>
        <Select
          placeholder={'Choose a Pokemon'}
          value={selectedItem}
          options={dropdownItems}
          onChange={selected =>
            setSelectedItem(
              selected ?? {
                value: 0,
                label: 'Select A Pokemon',
              }
            )
          }
          isSearchable={true}
        />
        <button onClick={addPokemon} style={{ backgroundColor: 'lightgreen' }}>
          Add Pokemon
        </button>
      </div>

      <div>{pokemon.map(p => p.button)}</div>
    </div>
  )
}
