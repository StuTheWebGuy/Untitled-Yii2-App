import { useEffect, useState } from 'react'
import Select from 'react-select'

type PokemonSpecies = {
  id: number
  images_collection_id?: number
  name: string
  url: string
}

export default function Test() {
  const [health, setHealth] = useState<string>('')
  const [dropdownItems, setDropdownItems] = useState<string[]>([''])
  const [selectedItem, setSelectedItem] = useState<string>('')

  async function healthCheck() {
    try {
      const json = await (await fetch('http://127.0.0.1:8000/health/check')).json()

      setHealth(JSON.stringify(json))
    } catch (err) {
      console.error(err)
    }
  }

  async function loadDropdownItems() {
    try {
      const json = await (
        await fetch(`http://127.0.0.1:8000/pokemon-species/index/?per-page=1000`)
      ).json()
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
          onChange={selected => setSelectedItem(selected ?? 'Choose a Pokemon')}
          isSearchable={true}
        />
      </div>
    </div>
  )
}
