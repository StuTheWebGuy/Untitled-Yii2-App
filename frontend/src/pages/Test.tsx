import { useEffect, useState } from 'react'
import Select from 'react-select'

const BASE_URL = 'http://127.0.0.1:8000'

type PokemonSpecies = {
  id: number
  images_collection_id?: number
  name: string
  url: string
}

export default function Test() {
  const [health, setHealth] = useState<string>('')
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

  async function healthCheck() {
    try {
      const json = await (await fetch(`${BASE_URL}/health/check`)).json()

      setHealth(JSON.stringify(json))
    } catch (err) {
      console.error(err)
    }
  }

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

  async function addPokemon() {
    alert(`adding ${selectedItem.label} to the team!`)
  }

  useEffect(() => {
    loadDropdownItems().then()
  }, [])

  return (
    <div>
      <div>
        <button onClick={healthCheck}>Health</button>
        <pre>{health}</pre>
      </div>
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
    </div>
  )
}
